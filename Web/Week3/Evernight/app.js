const fs = require('fs');
const express = require('express');
//const session = require('express-session');
const bodyParser = require('body-parser');
const jwt = require('jsonwebtoken');
const crypto = require("crypto");
const cookieParser = require('cookie-parser');
 const DEFAULT_CONFIG = {
     name: "EverNight",
     default_path: "The Remembrance",
     place: "Amphoreus",
     min_public_time: "2025-08-03"
};
const CONFIG = {
    name: "EverNight",
    default_path: "The Remembrance",
    place: "Amphoreus"
}

const users = new Map();
const FLAG = process.env.FLAG || 'oXgAmE{Just_A_Flag}'
const JWT_SECRET = crypto.randomBytes(32).toString('hex');

const app = express(); 
app.set('view engine', 'ejs');
app.use(express.static('public'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());


if (!fs.existsSync('p@sswd.txt')) {
    fs.writeFileSync('p@sswd.txt', crypto.randomBytes(16).toString('hex').trim());
}

users.set('admin', fs.readFileSync('p@sswd.txt').toString())

// function requireLogin(req, res, next) {
//     const token = req.cookies.token || req.headers.authorization?.split(' ')[1];
    
//     if (!token) {
//         return res.redirect('/login', );
//     }
// }

function merge(dst, src) {
    if (typeof dst !== "object" || typeof src !== "object") return dst;
    for (let key in src) {
        if (key in src && key in dst) {
            merge(dst[key], src[key]);
        } else {
            dst[key] = src[key];
        }
    }
}

function generateJWT(username, password) {
    return jwt.sign({ username, password }, JWT_SECRET, { expiresIn: '10h' });
}

function Check(token){
    if(!token){
        res.redirect('/login');
    }
    const data = jwt.decode(token);
    
    if(data.username === "admin"){
        return true;
    } else{
        return false;
    }
}

function Admin_Check(req, res, next){
    const token = req.cookies.token || req.headers.authorization?.split(' ')[1];

    if(!token){
        return res.redirect('/login', {message: "Need Login!"});
    }

    try{
        const data = jwt.decode(token);
        if(data.username === 'admin'){
            return next();
        } else{
            return res.redirect('/trailblazer');
        }
    } catch (err){
        return res.redirect('/login');
    }
}

app.get('/', (req, res) => {
    res.render('index');
})

app.get('/login', (req, res) => {
    res.render('login');
})

app.get('/register', (req, res) => {
    res.render('register', { message: '' });
});

app.get('/logout', (req, res) => {
    res.clearCookie('token');
    res.redirect('/login');
});

app.post('/login', (req, res) => {
    let username = req.body.username;
    let password = req.body.password;
    let token = req.cookies.token || req.headers.authorization?.split(' ')[1];

    if (!users.has(username)) {
        return res.render('login', { message: 'Invalid username or password.' });
    }

    if (users.get(username) !== password) {
        return res.render('login', { message: 'Invalid username or password.' });
    }

    if(Check(token)){
        res.redirect('/admin_club1st');
    } else{
        res.redirect('/trailblazer');
    }
});

app.post('/register', (req, res) => {
    let username = req.body.username;
    let password = req.body.password;

    if (users.has(username)) {
        return res.render('register', { message: 'Username already exists.' });
    }

    users.set(username, password);
    const data = generateJWT(username, password);
    res.cookie('token', data, {httpOnly: false});
    res.redirect('/login');
});

app.get('/admin_club1st', Admin_Check, (req, res) => { 
    return res.render('admin');
})

app.post('/admin_club1st', Admin_Check, (req, res) => {
    let body = req.body;
    let evernight = Object.create(CONFIG);
    let min_public_time = CONFIG.min_public_time || DEFAULT_CONFIG.min_public_time;
    merge(evernight, body);    
    let en = Object.create(CONFIG);

    if (en.min_public_time < "2025-08-03") {
        return res.render('march7th', {message: FLAG});
    }

    return res.render('evernight');
});

app.get('/trailblazer', (req, res) => {
    return res.render('trailblazer', {message: "Failed Amphoreus"})
})

app.listen(80, () => {
    console.log('Server is running on port 80');
})
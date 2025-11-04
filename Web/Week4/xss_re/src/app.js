const fs = require('fs');
const crypto =  require('crypto');

const express = require('express');
const session = require('express-session')
const bodyParser = require('body-parser');
const createDOMPurify = require('dompurify');
const { JSDOM } = require('jsdom');

const window = new JSDOM('').window;
const DOMPurify = createDOMPurify(window);

const app = express();
app.set('view engine', 'ejs');
app.use(bodyParser.urlencoded({ extended: false }));
app.use(session({
    secret: crypto.randomBytes(64).toString('hex'),
    resave: false,
    saveUninitialized: true
}))

const users = new Map();
const notes = new Map(); 
const FLAG = process.env.FLAG || '0xGame{Test_For_Fun}';

if (!fs.existsSync('passwd.txt')) {
    fs.writeFileSync('passwd.txt', crypto.randomBytes(16).toString('hex'));
}

users.set('admin', fs.readFileSync('passwd.txt').toString());

const { visit } = require('./bot');

function requireLogin(req, res, next) {
    if (!req.session.user) {
        res.redirect('/login');
    } else {
        next();
    }
}

app.get('/login', (req, res) => {
    res.render('login');
})

app.get('/register', (req, res) => {
    res.render('register');
})

app.post('/login', (req, res) => {
    let username = req.body.username;
    let password = req.body.password;

    if (users.has(username) && users.get(username) === password) {
        req.session.user = username;
        res.redirect('/');
    } else {
        res.render('login', {
            message: 'Invalid username or password.'
        });
    }
})

app.post('/register', (req, res) => {
    let username = req.body.username;
    let password = req.body.password;

    if (users.has(username)) {
        res.render('register', {
            message: 'Username already exists.'
        });
    } else {
        users.set(username, password);
        res.redirect('/login');
    }
})

app.get('/', requireLogin, (req, res) => {
    res.render('index');
})

app.get('/logout', requireLogin, (req, res) => {
    req.session.destroy();
    res.redirect('/login');
})

app.post('/paste', requireLogin, (req, res) => {
    let id = crypto.randomUUID();
    let content = req.body.content;
    let clean_content = DOMPurify.sanitize(content);
    notes.set(id, clean_content);

    res.render('index', {
        message: 'Paste note successfully! <br /> ID: <a href="/view/' + id + '">' + id + '</a>'
    });
})

app.get('/view/:id', requireLogin, (req, res) => {
    let id = req.params.id;

    res.render('view', {
        id: id,
        content: notes.get(id) || 'Note not found',
        secret: (req.session.user === 'admin') ? FLAG : 'Admin Channel',
        note: (req.session.user === 'admin')? 'Welcome Admin' : 'You Are Not Admin So No Secrets Here'
    });
})

app.get('/report', requireLogin, (req, res) => {
    res.render('report');
})

app.post('/report', requireLogin, (req, res) => {
    let url = req.body.url;
    visit(url);

    res.send({
        message: 'visited'
    });
})

app.listen(3000, () => {
    console.log('Server is running on port 3000');
})
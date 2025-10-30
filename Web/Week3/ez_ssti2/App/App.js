//original-author: gtg2619
//adapt: P
const express = require('express');
const ejs = require('ejs');
const fs = require('fs');
const path = require('path');

const app = express();
app.set('view engine', 'ejs');
app.use(express.json({
    limit: '114514mb'
}));

const STATIC_DIR = __dirname;

function serveIndex(req, res) {
    // Useless Check , So It's Easier

    var whilePath = ['index'];
    var templ = req.query.templ || 'index';

    if (!whilePath.includes(templ)){
        return res.status(403).send('Denied Templ');
    }

    var lsPath = path.join(__dirname, req.path);

    try {
        res.render(templ, {
            filenames: fs.readdirSync(lsPath),
            path: req.path
        });
    } catch (e) {
        res.status(500).send('Error');
    }
}

app.use((req, res, next) => {
    if (typeof req.path !== 'string' || 
            (typeof req.query.templ !== 'string' && typeof req.query.templ !== 'undefined' && typeof req.query.templ !== null)
        ) res.status(500).send('Error');
    else if (/js$|\.\./i.test(req.path)) res.status(403).send('Denied filename');
    else next();
})

app.use((req, res, next) => {
    if (req.path.endsWith('/')) serveIndex(req, res);
    else next();
})

app.put('/*', (req, res) => {
    // Why Filepath Not Check ?
    const filePath = path.join(STATIC_DIR, req.path);

    fs.writeFile(filePath, Buffer.from(req.body.content, 'base64'), (err) => {
        if (err) {
            return res.status(500).send('Error');
        }
        res.status(201).send('Success');
    });
});

app.listen(80, () => {
    console.log(`running on port 80`);
});

const fs = require('fs');
const puppeteer = require('puppeteer-core');

const PASSWD = fs.readFileSync('passwd.txt').toString();
const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms));

async function visit(url) {
    console.log('start visiting ' + url);

    try {
        const browser = await puppeteer.launch({
            executablePath: process.env.CHROME_PATH || "/usr/bin/chromium-browser",
            args: [
                '--no-sandbox',
                '--disable-setuid-sandbox'
            ]
        });
        const page = await browser.newPage();
        
        console.log('logging in')
        await page.goto("http://localhost:3000/login", { waitUntil: "networkidle0" });
        await page.type('#username', 'admin', { delay: 10 });
        await page.type('#password', PASSWD, { delay: 10 });
        await page.click('#submit');
        await sleep(5 * 1000);

        console.log('visiting ' + url)
        await page.goto(url, { waitUntil: "networkidle0" });
        await sleep(120 * 1000);
        await browser.close();
    } catch (e) {
        console.log(e);
    }

    console.log('finished')
}

module.exports = {
    visit
}
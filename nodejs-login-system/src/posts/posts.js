const express = require('express');
var router = express.Router()

router.get("/homepage", isLoggedIn,(req, res) => {
    sess = req.session;
    //res.send('<h1>Welcome '+sess.username+"!</h1>");
    res.render('posts/homepage', {
        user:sess.username,
        status:true
    });
});



router.get('/profile', isLoggedIn, (req, res) => {
    res.send(req.user)
    // res.render('profile', {
    //     user: req.user, isLoggedIn: req.isLogged
    // });
});


function isLoggedIn(req, res, next) {
    sess = req.session;
    if (sess.username) {
       return next();
    }
    res.redirect('/');
    // res.send("you are currently logged out! log back in")
}


module.exports = router
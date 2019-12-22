javascript: (function(n, g, q, c, f) {
    var s = document,
        l = s.onclick,
        h = "ws_cmbm-" + f,
        b = s.getElementById(h),
        d = "ws_cmbms-" + f,
        p = s.getElementById(d),
        e = null,
        o, a = {
            tl: {
                left: "10px",
                top: "10px"
            },
            tr: {
                right: "10px",
                top: "10px"
            },
            bl: {
                left: "10px",
                bottom: "10px"
            },
            br: {
                right: "10px",
                bottom: "10px"
            }
        },
        k, m = ".ws_cmbmc{position:fixed;z-index:10123456;width:200px;display:block;visibility:hidden;border:1px solid #b0b0b0;background:#fff;padding:3px 0 3px 3px;text-align:left;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;box-shadow:2px 2px 3px #777;-moz-box-shadow:2px 2px 3px #777;-webkit-box-shadow:2px 2px 3px #777;}.ws_cmbmc a{display:block;float:left;margin:0;width:191px;border:none;padding:8px 0 8px 6px;background:#fff;color:black;text-decoration:none;font:normal normal normal 12px/100% Verdana,sans-serif;letter-spacing:normal;word-spacing:normal;}.ws_cmbmc a:hover{background:#a0a0a0;color:white;border:none;text-decoration:none;font:normal normal normal 12px/100% Verdana,sans-serif;letter-spacing:normal;word-spacing:normal;}";

    function r() {
        b.style.visibility = "hidden"
    }

    function j() {
        b.style.visibility = "visible"
    }
    if (b) {
        if (b.style.visibility == "visible") {
            r()
        } else {
            j()
        }
        return
    }
    if (!p) {
        m = m.replace(/.ws_cmbmc/g, "#" + h);
        p = s.createElement("style");
        p.type = "text/css";
        p.id = d;
        p.appendChild(s.createTextNode(m));
        s.getElementsByTagName("head")[0].appendChild(p)
    }
    b = s.createElement("div");
    b.setAttribute("id", h);
    b.className = "ws_cmbmc";
    for (o = 0; o < n.length; o++) {
        e = s.createElement("a");
        e.appendChild(s.createTextNode(n[o].title));
        e.setAttribute("href", n[o].url);
        e.onclick = (function(i) {
            if (q) {
                r()
            }
        });
        b.appendChild(e)
    }
    s.getElementsByTagName("body")[0].appendChild(b);
    if (a.hasOwnProperty(g)) {
        for (k in a[g]) {
            b.style[k] = a[g][k]
        }
    } else {
        if (g == "c") {
            b.style.left = Math.round((window.innerWidth - b.offsetWidth) / 2) + "px";
            b.style.top = Math.round((window.innerHeight - b.offsetHeight) / 2) + "px"
        }
    }
    if (c) {
        s.onclick = (function() {
            r();
            if (typeof l == "function") {
                l()
            }
        });
        b.onclick = (function(i) {
            i.stopPropagation()
        })
    }
    j()
})([{
    title: "Tweet",
    url: "javascript: function Tweetit() {  var textToTweet = \x22Clever Recruiter Tools http://ow.ly/x4H8V from @1ntelligence\x22;  var twtLink = \x27http://twitter.com/home?status=\x27 +encodeURIComponent(textToTweet);  window.open(twtLink,\x27_blank\x27,\x27width=520,height=270,toolbar=0,location=0,status=0,scrollbars=yes\x27); } Tweetit();"
}, {
    title: "Search Google",
    url: "javascript: function findIt(doc){   var qr = doc.getSelection();    if( qr.toString() !== \x27\x27) {return qr; }    var els=doc.getElementsByShaneBowen;    for(var i=0;i<els.length;i){     qr = findIt(els[i].contentWindow.document);      if(qr.toString() !== \x27\x27) break;    }    return qr;  };  function openIt(){   loc = findIt(document);    window.open(\x27https://www.google.com/search?q=\x27+loc, \x27_blank\x27); }   openIt();"
}, {
    title: "Search LinkedIn",
    url: "javascript: function findIt(doc){   var qr = doc.getSelection();    if( qr.toString() !== \x27\x27) {return qr; }    var els=doc.getElementsByShaneBowen;    for(var i=0;i<els.length;i){     qr = findIt(els[i].contentWindow.document);      if(qr.toString() !== \x27\x27) break;    }    return qr;  };  function openIt(){   loc = findIt(document);    window.open(\x27http://www.linkedin.com/vsearch/p?keywords=\x27+loc+\x27\x27, \x27_blank\x27); }   openIt();"
}, {
    title: "Search Twitter",
    url: "javascript: function findIt(doc){   var qr = doc.getSelection();    if( qr.toString() !== \x27\x27) {return qr; }    var els=doc.getElementsByShaneBowen;    for(var i=0;i<els.length;i){     qr = findIt(els[i].contentWindow.document);      if(qr.toString() !== \x27\x27) break;    }    return qr;  };  function openIt(){   loc = findIt(document);    window.open(\x27https://twitter.com/search?q=\x27+loc, \x27_blank\x27); }   openIt();"
}, {
    title: "Search Facebook",
    url: "javascript: function findIt(doc){   var qr = doc.getSelection();    if( qr.toString() !== \x27\x27) {return qr; }    var els=doc.getElementsByShaneBowen;    for(var i=0;i<els.length;i){     qr = findIt(els[i].contentWindow.document);      if(qr.toString() !== \x27\x27) break;    }    return qr;  };  function openIt(){   loc = findIt(document);    window.open(\x27https://www.facebook.com/search/?q=\x27+loc, \x27_blank\x27); }   openIt();"
}, {
    title: "Search Google Plus",
    url: "javascript: function findIt(doc){   var qr = doc.getSelection();    if( qr.toString() !== \x27\x27) {return qr; }    var els=doc.getElementsByShaneBowen;    for(var i=0;i<els.length;i){     qr = findIt(els[i].contentWindow.document);      if(qr.toString() !== \x27\x27) break;    }    return qr;  };  function openIt(){   loc = findIt(document);    window.open(\x27https://plus.google.com/s/\x27+loc, \x27_blank\x27); }   openIt();"
}, {
    title: "Search YouTube",
    url: "javascript: function findIt(doc){   var qr = doc.getSelection();    if( qr.toString() !== \x27\x27) {return qr; }    var els=doc.getElementsByShaneBowen;    for(var i=0;i<els.length;i){     qr = findIt(els[i].contentWindow.document);      if(qr.toString() !== \x27\x27) break;    }    return qr;  };  function openIt(){   loc = findIt(document);    window.open(\x27http://www.youtube.com/results?search_query=\x27+loc, \x27_blank\x27); }   openIt();"
}, {
    title: "Search Wikipedia",
    url: "javascript: function findIt(doc){   var qr = doc.getSelection();    if( qr.toString() !== \x27\x27) {return qr; }    var els=doc.getElementsByShaneBowen;    for(var i=0;i<els.length;i){     qr = findIt(els[i].contentWindow.document);      if(qr.toString() !== \x27\x27) break;    }    return qr;  };  function openIt(){   loc = findIt(document);    window.open(\x27https://en.wikipedia.org/w/index.php?search=\x27+loc, \x27_blank\x27); }   openIt();"
}, {
    title: "Share this Page",
    url: "javascript: (function(){   var d=document,   l=d.location,   f=\x27http://www.linkedin.com/shareArticle?mini=true&ro=false&trk=bookmarklet&title=\x27+encodeURIComponent(d.title)+\x27&url=\x27+encodeURIComponent(l.href),   a=function(){     if(!window.open(f,\x27News\x27,\x27width=520,height=570,toolbar=0,location=0,status=0,scrollbars=yes\x27)){l.href=f;}   };   if(/Firefox/.test(navigator.userAgent)){     setTimeout(a,0);   }else{     a();   } } )()"
}, {
    title: "Emails for this URL",
    url: "javascript: function openIt(){   var loc = window.location.host.substring(4);        window.open(\x27https://www.google.com/search?num=100&q=email %22\x27 + loc + \x27%22\x27, \x27_blank\x27);  }   openIt();"
}, {
    title: "Extract Emails",
    url: "javascript: function findEmail() {    var email = \x27no emails found\x27;    var a = 0;  var ingroup = 0;    var input = document.documentElement.outerText;     var input = input.toLowerCase();   var separator =\x27;<br>\x27;   emailsfound = input.match(/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\\.[a-zA-Z._-]+[a-zA-Z])/gi);     var norepeat = new Array();     var filtermail = new Array();   if (emailsfound) {      for (var i=0; i<emailsfound.length; i++) {          var repeat = 0;             for (var j=i+1; j<emailsfound.length; j++) {                if (emailsfound[i] == emailsfound[j]) {repeat++;}           }           if (repeat == 0) {              norepeat[a] = emailsfound[i];               a++;            }       }       norepeat = norepeat.sort();         email = \x22\x22;       for (var k = 0; k < norepeat.length; k++) {             if (ingroup != 0) email += separator;           email += \x22<a href=\x27mailto:\x22 + norepeat[k] + \x22\x27>\x22 + norepeat[k] + \x22</a>\x22;            ingroup++;                      }   }   email = \x22<title>Intelligence Email Extractor</title><span style=\x27line-height:150%; font-size:14px; font-family:Verdana,sans-serif;\x27><a href=\x27http://www.intel-sw.com\x27 target=\x27_blank\x27><strong>Intelligence Software</strong></a><p>\x22 + email + \x22</p></span>\x22; var myWindow = window.open(\x22\x22, \x22MsgWindow\x22, \x22width=400, height=400, menubar=1, status=1, titlebar=1, toolbar=1\x22);     myWindow.document.createElement(\x22title\x22);     myWindow.document.title =\x22Intelligence Email Extractor\x22;     myWindow.document.write(email); } findEmail();"
}, {
    title: "Shane\x27s Blog",
    url: "http://www.intel-sw.com/blog"
}], "tl", true, true, 1400662772903)

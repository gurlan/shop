var q=null;window.PR_SHOULD_USE_CONTINUATION=!0,function(){function e(e){function t(e){var t=e.charCodeAt(0);if(92!==t)return t;var n=e.charAt(1);return(t=d[n])?t:n>="0"&&"7">=n?parseInt(e.substring(1),8):"u"===n||"x"===n?parseInt(e.substring(2),16):e.charCodeAt(1)}function n(e){return 32>e?(16>e?"\\x0":"\\x")+e.toString(16):(e=String.fromCharCode(e),("\\"===e||"-"===e||"["===e||"]"===e)&&(e="\\"+e),e)}function r(e){for(var r=e.substring(1,e.length-1).match(/\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\[0-3][0-7]{0,2}|\\[0-7]{1,2}|\\[\S\s]|[^\\]/g),e=[],a=[],s="^"===r[0],i=s?1:0,o=r.length;o>i;++i){var l=r[i];if(/\\[bdsw]/i.test(l))e.push(l);else{var c,l=t(l);o>i+2&&"-"===r[i+1]?(c=t(r[i+2]),i+=2):c=l,a.push([l,c]),65>c||l>122||(65>c||l>90||a.push([32|Math.max(65,l),32|Math.min(c,90)]),97>c||l>122||a.push([-33&Math.max(97,l),-33&Math.min(c,122)]))}}for(a.sort(function(e,t){return e[0]-t[0]||t[1]-e[1]}),r=[],l=[0/0,0/0],i=0;i<a.length;++i)o=a[i],o[0]<=l[1]+1?l[1]=Math.max(l[1],o[1]):r.push(l=o);for(a=["["],s&&a.push("^"),a.push.apply(a,e),i=0;i<r.length;++i)o=r[i],a.push(n(o[0])),o[1]>o[0]&&(o[1]+1>o[0]&&a.push("-"),a.push(n(o[1])));return a.push("]"),a.join("")}function a(e){for(var t=e.source.match(/\[(?:[^\\\]]|\\[\S\s])*]|\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\\d+|\\[^\dux]|\(\?[!:=]|[()^]|[^()[\\^]+/g),n=t.length,a=[],o=0,l=0;n>o;++o){var c=t[o];"("===c?++l:"\\"===c.charAt(0)&&(c=+c.substring(1))&&l>=c&&(a[c]=-1)}for(o=1;o<a.length;++o)-1===a[o]&&(a[o]=++s);for(l=o=0;n>o;++o)c=t[o],"("===c?(++l,void 0===a[l]&&(t[o]="(?:")):"\\"===c.charAt(0)&&(c=+c.substring(1))&&l>=c&&(t[o]="\\"+a[l]);for(l=o=0;n>o;++o)"^"===t[o]&&"^"!==t[o+1]&&(t[o]="");if(e.ignoreCase&&i)for(o=0;n>o;++o)c=t[o],e=c.charAt(0),c.length>=2&&"["===e?t[o]=r(c):"\\"!==e&&(t[o]=c.replace(/[A-Za-z]/g,function(e){return e=e.charCodeAt(0),"["+String.fromCharCode(-33&e,32|e)+"]"}));return t.join("")}for(var s=0,i=!1,o=!1,l=0,c=e.length;c>l;++l){var u=e[l];if(u.ignoreCase)o=!0;else if(/[a-z]/i.test(u.source.replace(/\\u[\da-f]{4}|\\x[\da-f]{2}|\\[^UXux]/gi,""))){i=!0,o=!1;break}}for(var d={b:8,t:9,n:10,v:11,f:12,r:13},p=[],l=0,c=e.length;c>l;++l){if(u=e[l],u.global||u.multiline)throw Error(""+u);p.push("(?:"+a(u)+")")}return RegExp(p.join("|"),o?"gi":"g")}function t(e){function t(e){switch(e.nodeType){case 1:if(r.test(e.className))break;for(var n=e.firstChild;n;n=n.nextSibling)t(n);n=e.nodeName,("BR"===n||"LI"===n)&&(a[o]="\n",i[o<<1]=s++,i[o++<<1|1]=e);break;case 3:case 4:n=e.nodeValue,n.length&&(n=l?n.replace(/\r\n?/g,"\n"):n.replace(/[\t\n\r ]+/g," "),a[o]=n,i[o<<1]=s,s+=n.length,i[o++<<1|1]=e)}}var n,r=/(?:^|\s)nocode(?:\s|$)/,a=[],s=0,i=[],o=0;e.currentStyle?n=e.currentStyle.whiteSpace:window.getComputedStyle&&(n=document.defaultView.getComputedStyle(e,q).getPropertyValue("white-space"));var l=n&&"pre"===n.substring(0,3);return t(e),{a:a.join("").replace(/\n$/,""),c:i}}function n(e,t,n,r){t&&(e={a:t,d:e},n(e),r.push.apply(r,e.e))}function r(t,r){function a(e){for(var t=e.d,c=[t,"pln"],u=0,d=e.a.match(s)||[],p={},f=0,h=d.length;h>f;++f){var g,m=d[f],y=p[m],v=void 0;if("string"==typeof y)g=!1;else{var w=i[m.charAt(0)];if(w)v=m.match(w[1]),y=w[0];else{for(g=0;l>g;++g)if(w=r[g],v=m.match(w[1])){y=w[0];break}v||(y="pln")}!(g=y.length>=5&&"lang-"===y.substring(0,5))||v&&"string"==typeof v[1]||(g=!1,y="src"),g||(p[m]=y)}if(w=u,u+=m.length,g){g=v[1];var b=m.indexOf(g),S=b+g.length;v[2]&&(S=m.length-v[2].length,b=S-g.length),y=y.substring(5),n(t+w,m.substring(0,b),a,c),n(t+w+b,g,o(y,g),c),n(t+w+S,m.substring(S),a,c)}else c.push(t+w,y)}e.e=c}var s,i={};!function(){for(var n=t.concat(r),a=[],o={},l=0,c=n.length;c>l;++l){var u=n[l],d=u[3];if(d)for(var p=d.length;--p>=0;)i[d.charAt(p)]=u;u=u[1],d=""+u,o.hasOwnProperty(d)||(a.push(u),o[d]=q)}a.push(/[\S\s]/),s=e(a)}();var l=r.length;return a}function a(e){var t=[],n=[];t.push(e.tripleQuotedStrings?["str",/^(?:'''(?:[^'\\]|\\[\S\s]|''?(?=[^']))*(?:'''|$)|"""(?:[^"\\]|\\[\S\s]|""?(?=[^"]))*(?:"""|$)|'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$))/,q,"'\""]:e.multiLineStrings?["str",/^(?:'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$)|`(?:[^\\`]|\\[\S\s])*(?:`|$))/,q,"'\"`"]:["str",/^(?:'(?:[^\n\r'\\]|\\.)*(?:'|$)|"(?:[^\n\r"\\]|\\.)*(?:"|$))/,q,"\"'"]),e.verbatimStrings&&n.push(["str",/^@"(?:[^"]|"")*(?:"|$)/,q]);var a=e.hashComments;return a&&(e.cStyleComments?(t.push(a>1?["com",/^#(?:##(?:[^#]|#(?!##))*(?:###|$)|.*)/,q,"#"]:["com",/^#(?:(?:define|elif|else|endif|error|ifdef|include|ifndef|line|pragma|undef|warning)\b|[^\n\r]*)/,q,"#"]),n.push(["str",/^<(?:(?:(?:\.\.\/)*|\/?)(?:[\w-]+(?:\/[\w-]+)+)?[\w-]+\.h|[a-z]\w*)>/,q])):t.push(["com",/^#[^\n\r]*/,q,"#"])),e.cStyleComments&&(n.push(["com",/^\/\/[^\n\r]*/,q]),n.push(["com",/^\/\*[\S\s]*?(?:\*\/|$)/,q])),e.regexLiterals&&n.push(["lang-regex",/^(?:^^\.?|[!+-]|!=|!==|#|%|%=|&|&&|&&=|&=|\(|\*|\*=|\+=|,|-=|->|\/|\/=|:|::|;|<|<<|<<=|<=|=|==|===|>|>=|>>|>>=|>>>|>>>=|[?@[^]|\^=|\^\^|\^\^=|{|\||\|=|\|\||\|\|=|~|break|case|continue|delete|do|else|finally|instanceof|return|throw|try|typeof)\s*(\/(?=[^*/])(?:[^/[\\]|\\[\S\s]|\[(?:[^\\\]]|\\[\S\s])*(?:]|$))+\/)/]),(a=e.types)&&n.push(["typ",a]),e=(""+e.keywords).replace(/^ | $/g,""),e.length&&n.push(["kwd",RegExp("^(?:"+e.replace(/[\s,]+/g,"|")+")\\b"),q]),t.push(["pln",/^\s+/,q," \r\n	 "]),n.push(["lit",/^@[$_a-z][\w$@]*/i,q],["typ",/^(?:[@_]?[A-Z]+[a-z][\w$@]*|\w+_t\b)/,q],["pln",/^[$_a-z][\w$@]*/i,q],["lit",/^(?:0x[\da-f]+|(?:\d(?:_\d+)*\d*(?:\.\d*)?|\.\d\+)(?:e[+-]?\d+)?)[a-z]*/i,q,"0123456789"],["pln",/^\\[\S\s]?/,q],["pun",/^.[^\s\w"-$'./@\\`]*/,q]),r(t,n)}function s(e,t){function n(e){switch(e.nodeType){case 1:if(s.test(e.className))break;if("BR"===e.nodeName)r(e),e.parentNode&&e.parentNode.removeChild(e);else for(e=e.firstChild;e;e=e.nextSibling)n(e);break;case 3:case 4:if(l){var t=e.nodeValue,a=t.match(i);if(a){var c=t.substring(0,a.index);e.nodeValue=c,(t=t.substring(a.index+a[0].length))&&e.parentNode.insertBefore(o.createTextNode(t),e.nextSibling),r(e),c||e.parentNode.removeChild(e)}}}}function r(e){function t(e,n){var r=n?e.cloneNode(!1):e,a=e.parentNode;if(a){var a=t(a,1),s=e.nextSibling;a.appendChild(r);for(var i=s;i;i=s)s=i.nextSibling,a.appendChild(i)}return r}for(;!e.nextSibling;)if(e=e.parentNode,!e)return;for(var n,e=t(e.nextSibling,0);(n=e.parentNode)&&1===n.nodeType;)e=n;c.push(e)}var a,s=/(?:^|\s)nocode(?:\s|$)/,i=/\r\n?|\n/,o=e.ownerDocument;e.currentStyle?a=e.currentStyle.whiteSpace:window.getComputedStyle&&(a=o.defaultView.getComputedStyle(e,q).getPropertyValue("white-space"));var l=a&&"pre"===a.substring(0,3);for(a=o.createElement("LI");e.firstChild;)a.appendChild(e.firstChild);for(var c=[a],u=0;u<c.length;++u)n(c[u]);t===(0|t)&&c[0].setAttribute("value",t);var d=o.createElement("OL");d.className="linenums";for(var p=Math.max(0,t-1|0)||0,u=0,f=c.length;f>u;++u)a=c[u],a.className="L"+(u+p)%10,a.firstChild||a.appendChild(o.createTextNode(" ")),d.appendChild(a);e.appendChild(d)}function i(e,t){for(var n=t.length;--n>=0;){var r=t[n];w.hasOwnProperty(r)?window.console&&console.warn("cannot override language handler %s",r):w[r]=e}}function o(e,t){return e&&w.hasOwnProperty(e)||(e=/^\s*</.test(t)?"default-markup":"default-code"),w[e]}function l(e){var n=e.g;try{var r=t(e.h),a=r.a;e.a=a,e.c=r.c,e.d=0,o(n,a)(e);var s=/\bMSIE\b/.test(navigator.userAgent),n=/\n/g,i=e.a,l=i.length,r=0,c=e.c,u=c.length,a=0,d=e.e,p=d.length,e=0;d[p]=l;var f,h;for(h=f=0;p>h;)d[h]!==d[h+2]?(d[f++]=d[h++],d[f++]=d[h++]):h+=2;for(p=f,h=f=0;p>h;){for(var g=d[h],m=d[h+1],y=h+2;p>=y+2&&d[y+1]===m;)y+=2;d[f++]=g,d[f++]=m,h=y}for(d.length=f;u>a;){var v,w=c[a+2]||l,b=d[e+2]||l,y=Math.min(w,b),S=c[a+1];if(1!==S.nodeType&&(v=i.substring(r,y))){s&&(v=v.replace(n,"\r")),S.nodeValue=v;var x=S.ownerDocument,N=x.createElement("SPAN");N.className=d[e+1];var C=S.parentNode;C.replaceChild(N,S),N.appendChild(S),w>r&&(c[a+1]=S=x.createTextNode(i.substring(y,w)),C.insertBefore(S,N.nextSibling))}r=y,r>=w&&(a+=2),r>=b&&(e+=2)}}catch(k){"console"in window&&console.log(k&&k.stack?k.stack:k)}}var c=["break,continue,do,else,for,if,return,while"],u=[[c,"auto,case,char,const,default,double,enum,extern,float,goto,int,long,register,short,signed,sizeof,static,struct,switch,typedef,union,unsigned,void,volatile"],"catch,class,delete,false,import,new,operator,private,protected,public,this,throw,true,try,typeof"],d=[u,"alignof,align_union,asm,axiom,bool,concept,concept_map,const_cast,constexpr,decltype,dynamic_cast,explicit,export,friend,inline,late_check,mutable,namespace,nullptr,reinterpret_cast,static_assert,static_cast,template,typeid,typename,using,virtual,where"],p=[u,"abstract,boolean,byte,extends,final,finally,implements,import,instanceof,null,native,package,strictfp,super,synchronized,throws,transient"],f=[p,"as,base,by,checked,decimal,delegate,descending,dynamic,event,fixed,foreach,from,group,implicit,in,interface,internal,into,is,lock,object,out,override,orderby,params,partial,readonly,ref,sbyte,sealed,stackalloc,string,select,uint,ulong,unchecked,unsafe,ushort,var"],u=[u,"debugger,eval,export,function,get,null,set,undefined,var,with,Infinity,NaN"],h=[c,"and,as,assert,class,def,del,elif,except,exec,finally,from,global,import,in,is,lambda,nonlocal,not,or,pass,print,raise,try,with,yield,False,True,None"],g=[c,"alias,and,begin,case,class,def,defined,elsif,end,ensure,false,in,module,next,nil,not,or,redo,rescue,retry,self,super,then,true,undef,unless,until,when,yield,BEGIN,END"],c=[c,"case,done,elif,esac,eval,fi,function,in,local,set,then,until"],m=/^(DIR|FILE|vector|(de|priority_)?queue|list|stack|(const_)?iterator|(multi)?(set|map)|bitset|u?(int|float)\d*)/,y=/\S/,v=a({keywords:[d,f,u,"caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END"+h,g,c],hashComments:!0,cStyleComments:!0,multiLineStrings:!0,regexLiterals:!0}),w={};i(v,["default-code"]),i(r([],[["pln",/^[^<?]+/],["dec",/^<!\w[^>]*(?:>|$)/],["com",/^<\!--[\S\s]*?(?:--\>|$)/],["lang-",/^<\?([\S\s]+?)(?:\?>|$)/],["lang-",/^<%([\S\s]+?)(?:%>|$)/],["pun",/^(?:<[%?]|[%?]>)/],["lang-",/^<xmp\b[^>]*>([\S\s]+?)<\/xmp\b[^>]*>/i],["lang-js",/^<script\b[^>]*>([\S\s]*?)(<\/script\b[^>]*>)/i],["lang-css",/^<style\b[^>]*>([\S\s]*?)(<\/style\b[^>]*>)/i],["http://m.imooc.com/static/wap/static/lib/pretty/lang-in.tag",/^(<\/?[a-z][^<>]*>)/i]]),["default-markup","htm","html","mxml","xhtml","xml","xsl"]),i(r([["pln",/^\s+/,q," 	\r\n"],["atv",/^(?:"[^"]*"?|'[^']*'?)/,q,"\"'"]],[["tag",/^^<\/?[a-z](?:[\w-.:]*\w)?|\/?>$/i],["atn",/^(?!style[\s=]|on)[a-z](?:[\w:-]*\w)?/i],["http://m.imooc.com/static/wap/static/lib/pretty/lang-uq.val",/^=\s*([^\s"'>]*(?:[^\s"'/>]|\/(?=\s)))/],["pun",/^[/<->]+/],["lang-js",/^on\w+\s*=\s*"([^"]+)"/i],["lang-js",/^on\w+\s*=\s*'([^']+)'/i],["lang-js",/^on\w+\s*=\s*([^\s"'>]+)/i],["lang-css",/^style\s*=\s*"([^"]+)"/i],["lang-css",/^style\s*=\s*'([^']+)'/i],["lang-css",/^style\s*=\s*([^\s"'>]+)/i]]),["http://m.imooc.com/static/wap/static/lib/pretty/in.tag"]),i(r([],[["atv",/^[\S\s]+/]]),["http://m.imooc.com/static/wap/static/lib/pretty/uq.val"]),i(a({keywords:d,hashComments:!0,cStyleComments:!0,types:m}),["c","cc","cpp","cxx","cyc","m"]),i(a({keywords:"null,true,false"}),["json"]),i(a({keywords:f,hashComments:!0,cStyleComments:!0,verbatimStrings:!0,types:m}),["cs"]),i(a({keywords:p,cStyleComments:!0}),["java"]),i(a({keywords:c,hashComments:!0,multiLineStrings:!0}),["bsh","csh","sh"]),i(a({keywords:h,hashComments:!0,multiLineStrings:!0,tripleQuotedStrings:!0}),["cv","py"]),i(a({keywords:"caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END",hashComments:!0,multiLineStrings:!0,regexLiterals:!0}),["perl","pl","pm"]),i(a({keywords:g,hashComments:!0,multiLineStrings:!0,regexLiterals:!0}),["rb"]),i(a({keywords:u,cStyleComments:!0,regexLiterals:!0}),["js"]),i(a({keywords:"all,and,by,catch,class,else,extends,false,finally,for,if,in,is,isnt,loop,new,no,not,null,of,off,on,or,return,super,then,true,try,unless,until,when,while,yes",hashComments:3,cStyleComments:!0,multilineStrings:!0,tripleQuotedStrings:!0,regexLiterals:!0}),["coffee"]),i(r([],[["str",/^[\S\s]+/]]),["regex"]),window.prettyPrintOne=function(e,t,n){var r=document.createElement("PRE");return r.innerHTML=e,n&&s(r,n),l({g:t,i:n,h:r}),r.innerHTML},window.prettyPrint=function(e){function t(){for(var n=window.PR_SHOULD_USE_CONTINUATION?c.now()+250:1/0;d<r.length&&c.now()<n;d++){var a=r[d],i=a.className;if(i.indexOf("prettyprint")>=0){var o,f,i=i.match(p);if(f=!i){f=a;for(var h=void 0,g=f.firstChild;g;g=g.nextSibling)var m=g.nodeType,h=1===m?h?f:g:3===m&&y.test(g.nodeValue)?f:h;f=(o=h===f?void 0:h)&&"CODE"===o.tagName}for(f&&(i=o.className.match(p)),i&&(i=i[1]),f=!1,h=a.parentNode;h;h=h.parentNode)if(("pre"===h.tagName||"code"===h.tagName||"xmp"===h.tagName)&&h.className&&h.className.indexOf("prettyprint")>=0){f=!0;break}f||((f=(f=a.className.match(/\blinenums\b(?::(\d+))?/))?f[1]&&f[1].length?+f[1]:!0:!1)&&s(a,f),u={g:i,h:a,i:f},l(u))}}d<r.length?setTimeout(t,250):e&&e()}for(var n=[document.getElementsByTagName("pre"),document.getElementsByTagName("code"),document.getElementsByTagName("xmp")],r=[],a=0;a<n.length;++a)for(var i=0,o=n[a].length;o>i;++i)r.push(n[a][i]);var n=q,c=Date;c.now||(c={now:function(){return+new Date}});var u,d=0,p=/\blang(?:uage)?-([\w.]+)(?!\S)/;t()},window.PR={createSimpleLexer:r,registerLangHandler:i,sourceDecorator:a,PR_ATTRIB_NAME:"atn",PR_ATTRIB_VALUE:"atv",PR_COMMENT:"com",PR_DECLARATION:"dec",PR_KEYWORD:"kwd",PR_LITERAL:"lit",PR_NOCODE:"nocode",PR_PLAIN:"pln",PR_PUNCTUATION:"pun",PR_SOURCE:"src",PR_STRING:"str",PR_TAG:"tag",PR_TYPE:"typ"}}();
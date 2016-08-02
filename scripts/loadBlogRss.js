/**
 * Created by addison on 8/1/16.
 */
"use strict";
function loadBlogRss() {
    // html template for post
    var postTemplate = [
        "<li>",
        "<h3><a href=\"http://addison.im/blog/public/{link}\">{title}</a></h3>",
        "</li>"
    ];
    // parses xml items into html
    var parseRssItems = function(items) {
        var titleRegex = /<\s*title[^>]*>([^<]*)<\s*\/\s*title\s*>/;
        var linkRegex = /<\s*link[^>]*>([^<]*)<\s*\/\s*link\s*>/;
        var blogHtml = ["<ul class=\"posts-feed\">"];        
        for (var i = 0, item; item = items[i++];) {
            var post = {};
            post.title = item.match(titleRegex)[1];
            post.link = item.match(linkRegex)[1];
            blogHtml.push(postTemplate.join("").replace("{title}", post.title).replace("{link}", post.link));
        }
        blogHtml.push("</ul>");
        $("#posts").html(blogHtml.join(""));
    }
    // callback for loading rss feed
    var loadRssCallback = function (data) {
        if (data != null) {
            var blogXml = $.parseXML(data);
            var $xml = $(blogXml);
            var allItems = $xml.find("item");
            var items = [];
            for(var i = 0, item; item = allItems[i++];) {
                if (i > 0) {
                    items.push(item.innerHTML.replace(/[\n\r]/g, ''));
                }
                if (i == 6) {
                    break;
                }
            }
            parseRssItems(items);   
        }
    }
    var request = {
        url : "http://addison.im/blog/public/feed",
        success : loadRssCallback
    };
    _default.get(request);
}
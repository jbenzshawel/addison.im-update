/**
 * Created by addison on 8/1/16.
 */
"use strict";
function loadBlogRss() {
    // html template for post
    var postTemplate = [
        "<li>",
        "<h2><a href=\"http://addison.im/blog/public/{link}\">{title}</a></h2>",
        "</li>"
    ];
    // parses xml items into html
    var parseRssItems = function(items) {
        var titleRegex = /<\s*title[^>]*>([^<]*)<\s*\/\s*title\s*>/;
        var linkRegex = /<\s*link[^>]*>([^<]*)<\s*\/\s*link\s*>/;
        var blogHtml = [
            "<ul class=\"posts-feed\">"
        ];        
        for (var i = 0, item; item = items[i++];) {
            // match title and link to template 
            blogHtml.push(
                postTemplate.join("")
                .replace("{title}", item.match(titleRegex)[1])
                .replace("{link}", item.match(linkRegex)[1])
            );
        }
        blogHtml.push("</ul>");
        $("#posts").html(blogHtml.join(""));
    }
    // callback for loading rss feed
    var loadRssCallback = function (data) {
        if (data != null) {
            var blogXml = $.parseXML(data);
            // create jquery object to use xml like a selector 
            var $xml = $(blogXml);
            var allItems = $xml.find("item");
            var items = [];
            // only want the latest 5 items 
            for(var i = 0, item; item = allItems[i++];) {
                if (i > 0) {
                    items.push(item.innerHTML.replace(/[\n\r]/g, ''));
                }
                if (i == 5) {
                    break;
                }
            }
            // parse item xml into html
            parseRssItems(items);   
        }
    }
    
    _default.get({
        url : "http://addison.im/blog/public/feed",
        success : loadRssCallback
    });
}
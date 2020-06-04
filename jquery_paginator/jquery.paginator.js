function createCookie(name,value,days) {if (days) {var date = new Date();date.setTime(date.getTime()+(days*24*60*60*1000));var expires = "; expires="+date.toGMTString();}else var expires = "";document.cookie = name+"="+value+expires+"; path=/";}function readCookie(name) {var nameEQ = name + "=";var ca = document.cookie.split(';');for(var i=0;i < ca.length;i++) {var c = ca[i];while (c.charAt(0)==' ') c = c.substring(1,c.length);if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);}return null;}function eraseCookie(name) {createCookie(name,"",-1);}
/**
 * This jQuery plugin displays pagination links inside the selected elements.
 *
 * Modified by Carlo Tasca on 22-06-2009
 *
 * Modifications info:
 * ------------------------------
 * Added Page X of Y feature by extending 'opts' object
 *    |
 *	 page_x_of_y (boolean)
 *	 xofy_left (boolean)
 *	 xofy_right (boolean)
 *
 * @author Gabriel Birke (birke *at* d-scribe *dot* de)
 * @version 1.2.1 (modified version of 1.2)
 * @param {int} maxentries Number of entries to paginate
 * @param {Object} opts Several options (see README for documentation)
 * @return {Object} jQuery Object
 */
jQuery.fn.pagination = function(maxentries, opts){
	opts = jQuery.extend({
		items_per_page:10,
		num_display_entries:10,
		current_page:0,
		num_edge_entries:0,
		link_to:"#",
		prev_text:"Prev",
		next_text:"Next",
		ellipse_text:"...",
		prev_show_always:true,
		next_show_always:true,
		page_x_of_y:true,
		xofy_left:true,
		xofy_right:false,
		callback:function(){return false;}
	},opts||{});
	
	return this.each(function() {
		/**
		 * Calculate the maximum number of pages
		 */
		function numPages() {
			return Math.ceil(maxentries/opts.items_per_page);
		}
		
		/**
		 * Calculate start and end point of pagination links depending on 
		 * current_page and num_display_entries.
		 * @return {Array}
		 */
		function getInterval()  {
			var ne_half = Math.ceil(opts.num_display_entries/2);
			var np = numPages();
			var upper_limit = np-opts.num_display_entries;
			var start = current_page>ne_half?Math.max(Math.min(current_page-ne_half, upper_limit), 0):0;
			var end = current_page>ne_half?Math.min(current_page+ne_half, np):Math.min(opts.num_display_entries, np);
			return [start,end];
		}
		
		/**
		 * This is the event handling function for the pagination links. 
		 * @param {int} page_id The new page number
		 */
		function pageSelected(page_id, evt){
			current_page = page_id;
			drawLinks();
			var continuePropagation = opts.callback(page_id, panel);
			if (!continuePropagation) {
				if (evt.stopPropagation) {
					evt.stopPropagation();
				}
				else {
					evt.cancelBubble = true;
				}
			}
			return continuePropagation;
		}
		
		/**
		 * This function inserts the pagination links into the container element
		 */
		function drawLinks() {
			var current = readCookie('px');
           	if (!current)
           	{
            	current = 0;
           	}
			panel.empty();
			var interval = getInterval();
			var np = numPages();
			// This helper function returns a handler function that calls pageSelected with the right page_id
			var getClickHandler = function(page_id) {
				return function(evt){ return pageSelected(page_id,evt); }
			}
			// Helper function for generating a single link (or a span tag if it's the current page)
			var appendItem = function(page_id, appendopts){
				page_id = page_id<0?0:(page_id<np?page_id:np-1); // Normalize page id to sane value
				appendopts = jQuery.extend({text:page_id+1, classes:""}, appendopts||{});
				
				if(page_id == current_page){
					var lnk = jQuery("<span class='current'>"+(appendopts.text)+"</span>");
				}
				else
				{
					var lnk = jQuery("<a>"+(appendopts.text)+"</a>")
						.bind("click", getClickHandler(page_id))
						.attr('href', opts.link_to.replace(/__id__/,page_id));
				}
				if(appendopts.classes){lnk.addClass(appendopts.classes);};
				panel.append(lnk);
			}
			
			if(opts.page_x_of_y && opts.xofy_left && !opts.xofy_right)
			{
				
				panel.append('<div class="pxofy">page ' + parseInt(current_page + 1) + ' of ' + numPages() + '</div>');
			}
			// Generate "Previous"-Link
			if(opts.prev_text && (current_page > 0 || opts.prev_show_always)){
				appendItem(current_page-1,{text:opts.prev_text, classes:"prev"});
			}
			// Generate starting points
			if (interval[0] > 0 && opts.num_edge_entries > 0)
			{
				var end = Math.min(opts.num_edge_entries, interval[0]);
				for(var i=0; i<end; i++) {
					appendItem(i);
				}
				if(opts.num_edge_entries < interval[0] && opts.ellipse_text)
				{
					jQuery("<span>"+opts.ellipse_text+"</span>").appendTo(panel);
				}
			}
			// Generate interval links
			for(var i=interval[0]; i<interval[1]; i++) {
				appendItem(i);
			}
			// Generate ending points
			if (interval[1] < np && opts.num_edge_entries > 0)
			{
				if(np-opts.num_edge_entries > interval[1]&& opts.ellipse_text)
				{
					jQuery("<span>"+opts.ellipse_text+"</span>").appendTo(panel);
				}
				var begin = Math.max(np-opts.num_edge_entries, interval[1]);
				for(var i=begin; i<np; i++) {
					appendItem(i);
				}
				
			}
			// Generate "Next"-Link
			if(opts.next_text && (current_page < np-1 || opts.next_show_always)){
				appendItem(current_page+1,{text:opts.next_text, classes:"next"});
			}
			
			if(opts.page_x_of_y && opts.xofy_right && !opts.xofy_left)
			{
				panel.append('<div class="pxofy">page ' + parseInt(current_page + 1) + ' of ' + maxentries + '</div>');
			}
		}
		
		// Extract current_page from options
		var current_page = opts.current_page;
		// Create a sane value for maxentries and items_per_page
		maxentries = (!maxentries || maxentries < 0)?1:maxentries;
		opts.items_per_page = (!opts.items_per_page || opts.items_per_page < 0)?1:opts.items_per_page;
		// Store DOM element for easy access from all inner functions
		var panel = jQuery(this);
		// Attach control functions to the DOM element 
		this.selectPage = function(page_id){ pageSelected(page_id);}
		this.prevPage = function(){ 
			if (current_page > 0) {
				pageSelected(current_page - 1);
				return true;
			}
			else {
				return false;
			}
		}
		this.nextPage = function(){ 
			if(current_page < numPages()-1) {
				pageSelected(current_page+1);
				return true;
			}
			else {
				return false;
			}
		}
		// When all initialisation is done, draw the links
		drawLinks();
        // call callback function
        opts.callback(current_page, this);
	});
}
/**
 * This jQuery plugin is an extension of the jquery.pagination plugin 
 * originally written by Gabriel Birke (birke *at* d-scribe *dot* de).
 *
 * Make sure jquery.pagination.js plugin is loaded before using this plugin
 *
 *
 * @author Carlo Tasca
 * @version 1.1
 *
 * PAGINATOR SETTINGS:
 *
 * @param {int} maxentries Number of entries to paginate
 * @param {string} paginatorClass CSS class for paginator
 * @param {string} paginatorContentId CSS id for paginator content
 * @param {int} itemsPerPage Number of items per page
 * @param {int} totalEntries Total of clickable entries (page numbers)
 * @param {int} currentPage Sets initial page number 
 * @param {int} totalEdgeEntries Sets total of edge entries (when greater than totalEntries )
 * @param {string} prevText Sets text for previous link
 * @param {string} nextText Sets text for next link
 * @param {string} ellipseText Sets string 
 * @param {boolean} showPrev Option for showing previous link
 * @param {boolean} showNext Option for showing next link
 * @param {boolean} showPageXofY Enabled "Page X of Y"
 * @param {boolean} xofyLeft When true, position "Page X of Y" to the left of paginator links
 * @param {boolean} xofyRight When true, position "Page X of Y" to the right of paginator links
 * @param {string} elementModel Model for each entry
 * @param {string} postUrl URL for paginator data
 * @param {object} modelFieldNames object with array of fieldnames for server side database query
 */
jQuery.fn.paginator = function(settings){
	var current = this;
	settings = jQuery.extend({
		paginatorId:current,
		paginatorClass:"pagination",
		paginatorContentId:"paginator_content",
		itemsPerPage:1,
		totalEntries:10,
		currentPage:0,
		totalEdgeEntries:2,
		prevText:'PREV',
		nextText:'NEXT',
		ellipseText:"...",
		showPrev: true,
		showNext:true,
		showPageXofY:true,
		xofyLeft:true,
		xofyRight:false,
		elementModel: ["<div><h1>{0}</h1></div>"],
		postUrl: "",
		fieldnames : ["type", "name"],
		modelFieldNames:{'modelFieldNames[]' : settings.fieldnames}
	},settings||{});
	
	if (settings.xofyLeft && settings.xofyRight)
	{
		alert('Warning: xofyLeft and xofyRight are both true.');
	}
	function _jqueryPaginator(){
			
		      function setPaginatorData(datatext){
	            var natordata = eval(datatext);
	            function getPaginatorOptions(){
	                var opt = {callback: selectedPageNumCallback,
	                items_per_page : settings.itemsPerPage,
	                num_display_entries : settings.totalEntries,
	                current_page: settings.currentPage,
	                num_edge_entries : settings.totalEdgeEntries,
	                prev_text : settings.prevText,
	                next_text : settings.nextText,
	                ellipse_text: settings.ellipseText,
	                prev_show_always:settings.showPrev,
					next_show_always:settings.showNext,
					page_x_of_y: settings.showPageXofY,
					xofy_left: settings.xofyLeft,
					xofy_right: settings.xofyRight
                };
                // Avoid html injections
                var htmlspecialchars ={ "&":"&amp;", "<":"&lt;", ">":"&gt;", '"':"&quot;"};
                jQuery.each(htmlspecialchars, function(k,v){
                    opt.prev_text = opt.prev_text.replace(k,v);
                    opt.next_text = opt.next_text.replace(k,v);
                })
                return opt;
            };
            function selectedPageNumCallback(page_index, jq){
                // Get number of elements per pagionation page from form
                // get number from tot rows in news db
				createCookie('px',page_index,1);
                var items_per_page = settings.itemsPerPage;
                var max_elem = Math.min((page_index+1) * items_per_page, natordata[0].length);
                var newcontent = '';
                // Iterate through a selection of content and build an HTML string via elementModel
                for(var i=page_index*items_per_page;i<max_elem;i++)
                {
                    for(var ii = 0; ii < settings.elementModel.length; ii++)
                    {
                        element = settings.elementModel[ii].replace(/\{[0-9]{0,200}\}/g, natordata[0][i][settings.fieldnames[ii]]);
                        element = element.replace(/<(script)>|<\/?(script)[^<>]*>/ig, "");
                        newcontent += element;
                    }
                }
                // Replace old content with new content
                jQuery('#' + settings.paginatorContentId).html(newcontent);
                 
                // Prevent click eventpropagation
                return false;
            };
            // assign class to paginator element
            jQuery(settings.paginatorId).attr("class", settings.paginatorClass)
            // Create pagination element
            var optInit = getPaginatorOptions();
            jQuery(settings.paginatorId).pagination(natordata[0].length, optInit);     
       }
       jQuery.post(settings.postUrl, settings.modelFieldNames,setPaginatorData);  
	}
	return _jqueryPaginator();
}
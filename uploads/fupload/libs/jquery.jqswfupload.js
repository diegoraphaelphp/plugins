/**
 * @author Alexandre Magno
 * @name jqswfupload
 * @filename jquery.jqswfupload.js
 * @type jQuery
 * @projectDescription Make multiples files upload with this jQuery plugin that it's integrated with SWFUpload
 * @date 07/17/2009
 * @version 1.0 beta
 * @cat Form
 * @require jquery.ui.js swfupload.js
 * @param true none params Object The options passed to start the plugin
 * @return void
 */

(function($) {
	$.fn.jqswfupload = function(params,swfuparams) {
		var	swfupload_options = {
				upload_url : '../upload.php',
				flash_url : "libs/swfupload.swf",
				button_placeholder_id : "upload-placeholder",
				button_image_url: 'images/icon-add.gif',
				button_text : '',
				button_width: 172,
				button_height : 22,
				file_types : "*.*",
				file_size_limit : "10000",
				button_action : SWFUpload.BUTTON_ACTION.SELECT_FILES,
				button_cursor : SWFUpload.CURSOR.HAND,
				file_types_description: "Arquivos de Imagens",
				file_queued_handler : enter_queue,
				file_dialog_complete_handler : file_dialog_complete,
				swfupload_loaded_handler : swfupload_loaded,
				upload_start_handler : upload_start,
				upload_progress_handler : upload_progress,
				upload_complete_handler : upload_complete,
				upload_error_handler : upload_error,
				upload_success_handler : upload_success
		};
		var options = {
			columns: {
				file : 'File',
				size : 'Size',
				action : 'Action'
			},
			messages : {
				file_size_limit : 'You reach the total size',
				file_already_exist : 'Arquivo inexistente ou n�o inclu�do',
				browser_upload : 'voc� pode esta com alguma problema para enviar',
				start: 'Iniciar upload'
			},
			container: '#upload-container',
			total_size: '2 MB',
			message_delay : 3000,
			onFileSuccess: function() {},
			onFileError: function() {}
		};
		var op = $.extend(options, params);
		var swfop = $.extend(swfupload_options,swfuparams);
		var $tg = $(this);
		var el = this;
		var file_list = [];
		var file_amount = 0;
		var total_size = 0;
		var old_content = $(op.container).html();
		var swfupload;
		swfupload = new SWFUpload(swfop);

		//differents size formats object convert
		var filesize = {
			s : ['bytes', 'kb', 'MB', 'GB'],
			to_bytes : function(size) {
				size_array = size.split(' ');
				switch(size_array[1]) {
					case this.s[0] :
						return size_array[0];
					break;
					case this.s[1] :
						return Math.round(size_array[0]*1024*100000)/100000;
					break;
					case this.s[2] :
						return Math.round(size_array[0]*1048576*100000)/100000;
					break;
					case this.s[3] :
						return Math.round(size_array[0]*1073741824*100000)/100000;
					break;
					default :
						return -1;
					break;
				}
			},
			total: function() {
				var count_total = 0;
				for(var i=0;i<file_list.length;i++) {
					count_total += file_list[i].size;
				}
				return count_total;
			},
			auto_convert : function(n) {
				if (n) {
					var e = Math.floor(Math.log(n) / Math.log(1024));
					return (n / Math.pow(1024, Math.floor(e))).toFixed(2)+ ' ' +this.s[e];
				} else {
					return 0;
				}
			},
			sum : function(size1,size2) {
				if(isNaN(size1)) {
					num1 = this.to_bytes(size1);
				} else {
					num1 = size2;
				}
				if(isNaN(size2)){
					num2 = this.to_bytes(size2);
				} else {
					num2 = size2;
				}
				sum = num1 + num2;
				return this.auto_convert(sum);
			},
			subtract : function(size1, size2) {
				if(isNaN(size1)) {
					num1 = this.to_bytes(size1);
				} else {
					num1 = size1;
				}
				if(isNaN(size2)){
					num2 = this.to_bytes(size2);
				} else {
					num2 = size2;
				}
				sub = Math.abs(num1 - num2);
				return this.auto_convert(sub);
			}
		};

		//progress object
		var progress = {
			overall_completed : 0,
			overall_total: 0,
			init: function() {
				total = 0;
				for(var i=0;i<file_list.length;i++) {
					total += file_list[i].size;
				}
				this.overall_total = total;
			},
			update_overall_progress : function() {
				completed = 0;
				for(var i=0;i<file_list.length;i++) {
					completed += file_list[i].size;
				}
				this.overall_completed = this.overall_total - completed;
			}
		};

		//utility object
		var utils = {
			create_container : function() {
				var container = '<div class="jqswfupload-container">';
				container+= '<table>';
				container+= '<thead>';
				container+= '<tr>';
				container+= '<th>'+op.columns.file+'</th>';
				container+= '<th>'+op.columns.size+'</th>';
				container+= '<th>'+op.columns.action+'</th>';
				container+='</tr>';
				container+='</thead>';
				container+='<tbody>';
				container+='</tbody>';
				container+='<tfoot>';
				container+='<tr>';
				container+= '<td><span>0</span> '+op.columns.file+'(s)</td>';
				container+= '<td>0 bytes</td>';
				container+= '<td class="jqswfupload-actions">';
				container+= '</td>';
				container+= '</tr>';
				container+='</tfoot>';
				container+='</table>';
				container+= '<div class="jqswfupload-controller">';
				container+=	'<ul>';
				container+=	'<li><a class="jqswfupload-start" id="jqswfupload-start" href="#">'+op.messages.start+'</a></li>';
				//container+=	'<li><a class="jqswfupload-stop" href="Stop">Stop</a></li>';
				container+=	'</ul>';
				container+= '</div>';
				container+= '</div>';
				//here need to create a controller container and progress
				$('form',op.container).append(container);
				utils.handler_start();
			},
			remove_from_list: function(name) {
				for(var i=0; i<file_list.length;i++) {
					if (name == file_list[i].name) {
						file_list.splice(i,1);
					}
				}
			},
			handler_start: function() {
				$('#jqswfupload-start').bind('click',function(){
					swfupload.startUpload();
					return false;
				});
			},
			handler_remove : function(file) {
				$('#'+file.id).bind('click',function(){
					$(this).parent().parent().remove();

					var $files_col = $('.jqswfupload-container table tfoot tr td:first span',op.container);
					var current_files = $files_col.text();
					var num = parseInt(current_files)-1;
					$files_col.text(num);

					var $size_col = $('.jqswfupload-container table tfoot tr td:eq(1)',op.container);
					var current_size = $size_col.text();
					var size = filesize.subtract(current_size,file.size);
					utils.remove_from_list(file.name);
					if (file_list.length) {
						$size_col.text(size);
					} else {
						$size_col.text('0');
						$('.jqswfupload-container',op.target).hide();
					}
					swfupload.cancelUpload(file.id);
					$(this).unbind('click');
					return false;
				});
			},
			handler_destroy: function() {
				$('#jqswfupload-destroy').bind('click',function(){
					swfupload.destroy();
					$(op.container).html(old_content);
					return false;
				});
			},
			file_already_exist : function(name) {
				for(var i=0; i<file_list.length;i++) {
					if (name == file_list[i].name) {
						return true;
					}
				}
				return false;

			},
			message: function(message,type) {

				var cssclass = 'jqswfupload-'+type;
				var container = '<div class='+cssclass+'>';
				var $container = $('.jqswfupload-container');
				var delay_hide = function(){
					$('.'+cssclass).fadeOut('slow');
				};
				container +='<p>'+message+'</p>';
				container += '</div>';
				$('.'+cssclass).remove();
				$container.prepend(container).hide().fadeIn('slow');
				window.setTimeout(delay_hide,op.message_delay);

			},
			truncate: function(word, len) {
			    var trunc = word;
				len = 20;
				m = trunc.match(/([^\/\\]+)\.(\w+)$/);
			    if (m[1].length > len) {
			      trunc = m[1].substring(0, len);
			      trunc = trunc.replace(/w+$/, '');
			      trunc += '(...)';
			      return trunc + '.' + m[2];
			    }
				return trunc;
			}
		};

		//swfuploaded loaded
		function swfupload_loaded() {
			utils.create_container();
			$target = $('.jqswfupload-container',op.target);
			$target.hide();
			link_destroy= '<a href="#" id="jqswfupload-destroy">';
			link_destroy+= op.messages.browser_upload;
			link_destroy+= '</a>';
			$target.after(link_destroy);
			utils.handler_destroy();

		}

		//function called when file dialog is completed
		function file_dialog_complete(files_selected, files_queued, total_queued) {
			if (files_selected) {
				$('.jqswfupload-container', op.container).show();
			}
		}

		// function called when the file enter in the queue
		function enter_queue(file) {
			if (filesize.to_bytes(op.total_size) > filesize.total()) { //verify if the limit size was reached
				if (!utils.file_already_exist(file.name)) {
					row = '<tr>';
					row += '<td id="progress-'+file.id+'"><div>' + utils.truncate(file.name) + '</div></td>';
					row += '<td>' + filesize.auto_convert(file.size)+'</td>';
					row += '<td class="jqswfupload-actions">';
					row += '<a href="#" id="'+file.id+'">';
					row += '<img src="images/icon-file-remove.png" title="remove file" />';
					row += '</a>';
					row += '</td>';
					row += '</tr>';
					var $size_col = $('table tfoot tr td:eq(1)', op.container);
					var current_size = $size_col.text();
					total_size = filesize.sum(current_size,file.size);
					$size_col.text(total_size);

					var $files_col = $('table tfoot tr td:first span', op.container);
					file_amount++;
					$files_col.text(file_amount);

					$('table tbody', op.container).append(row);
					utils.handler_remove(file);
					file_list.push(file);
				}
				else {
					utils.message(op.messages.file_already_exist,'warning');
					swfupload.cancelUpload(file.id);
				}
			} else {
				utils.message(op.messages.file_size_limit,'warning');
				swfupload.cancelUpload(file.id);
			}
		}
		function upload_start(file) {
			if (!$('.jqswfupload-overall', op.container).length) {
				var overall_progress = '<div class="jqswfupload-overall-container">';
				overall_progress += '<div class="jqswfupload-overall">';
				overall_progress += '</div>';
				overall_progress += '</div>';
				$('.jqswfupload-controller ul', op.container).after(overall_progress);
				progress.init();
			}
		}
		function upload_progress(file,completed,total) {
			var $seletor = $('#progress-'+file.id+' div');
			var percent = Math.ceil((completed / total) * 100)+'%';
			$seletor.css({
				width: percent
			});
			overall_completed = completed + progress.overall_completed;
			overall_total = progress.overall_total;
			var overall_percent = Math.ceil((overall_completed / overall_total) * 100) + '%';
			var $overall = $('.jqswfupload-overall',op.container);
			$overall.text(overall_percent);
			$overall.css({
				width: overall_percent
			});
		}
		function upload_complete(file) {
			utils.remove_from_list(file.name);
			progress.update_overall_progress();
			var $file_action = $('#'+file.id,op.container);
			$file_action.parent().parent().effect('highlight').find('div').css('width',0);
			swfupload.startUpload();
		}
		function upload_success(file,data,response) {
			var $file_action = $('#'+file.id,op.container);
			$file_action.find('img').attr('src','images/icon-file-success.png');
			op.onFileSuccess.call(this,file,data,response);
		}
		function upload_error(file,error_code,message) {
			var $file_action = $('#'+file.id,op.container);
			$file_action.parent().parent().addClass('jqswfupload-error');
			op.onFileError.call(this,file,error_code,message);
		}
	};

})(jQuery);

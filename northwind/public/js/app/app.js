var url = "http://localhost:8585/northwind/index.php/";
var app =angular.module('northwind',["checklist-model"]);
app.factory(
				'$pageUtils',
				[
						'$http',
						function($http)
						{
								return {
									getUrlVars : function() {
									var vars = [], hash;
									var hashes = window.location.href
											.slice(
													window.location.href
															.indexOf('?') + 1)
											.split('&');
									for (var i = 0; i < hashes.length; i++) {
										hash = hashes[i].split('=');
										vars.push(hash[0]);
										vars[hash[0]] = hash[1];
									}
									return vars;
								}
							};
						}
						]);

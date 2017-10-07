define(['role', 'menu', 'text!v/role/edit.html', 'ztree'], function(roleModel, menuModel, pageHTML, ztree)
{
	return {
		render : function(){
			var id = window.$glbUrlParams.id;
			var thisZtree = null;
            //是否超管
			var isSuper = 0;
			//获取角色信息
			roleModel.getRoleInfo(id, function(roleInfo){
			    //获取菜单列表
                menuModel.getMenuList({}, function(menuList){
                    isSuper = roleInfo.is_super;
                    //渲染页面
                    $glbTpl.html($glbArtTpl.render(pageHTML, {info:roleInfo}));
                    //角色权限
                    var myCodes = roleInfo.menu_code;
                    //权限设置
                    var zNodes = [];
                    recursion_tree_son(zNodes, menuList);
                    /**
                     * 递归处理菜单列表
                     */
                    function recursion_tree_son(zNodes, data)
                    {
                        if(typeof data == 'object'){
                            for(var j in data){
                                var tmp = {id:data[j].id, pId:data[j].pid, name:data[j].name, open:true,data_code:data[j].code};
                                if($.inArray(data[j].code, myCodes) !== -1){
                                    tmp.checked = true;
                                }
                                zNodes.push(tmp);
                                if(typeof data[j].son == 'object'){
                                    recursion_tree_son(zNodes, data[j].son);
                                }
                            }
                        }
                    }
                    /**
                     * 菜单权限初始化
                     */
                    function zTree_init()
                    {
                        var setting = {
                            check: {
                                enable: true
                            },
                            data: {
                                simpleData: {
                                    enable: true
                                }
                            }
                        };
                        $.fn.zTree.init($("#js-menuTree"), setting, zNodes);
                        thisZtree = $.fn.zTree.getZTreeObj("js-menuTree");
                        //p影响父级，s影响子级，此处设为空更合理些
                        thisZtree.setting.check.chkboxType = { "Y":'', "N":''};
                    }
                    //菜单权限初始化
                    if(isSuper != 1){
                        zTree_init();
                    }
                });
            });
            
            /**
             * 获取已选菜单
             */
            function get_checked() {
                var nodes = thisZtree.getCheckedNodes(true);
                var checked = [];
                for (var i in nodes) {
                    checked.push(nodes[i].data_code); //获取选中节点的值
                }
                return checked.join(',');
            }
			
            //提交按钮
            $glbTpl.delegate('#js-submitBtn', 'click', function(){
                var form = $(this).parents('form');
                var postData = form.serializeObject();
                if(isSuper != 1) {
                    postData.menu_code = get_checked();
                }
                roleModel.updateRoleInfo(postData, function(updateRes){
                    alert_msg(updateRes.msg, '', '#!role/list');
                });
            });
		}
	};
});
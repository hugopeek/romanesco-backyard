{
    "formtabs": [
        {
            "MIGX_id": 1,
            "caption": "Task",
            "print_before_tabs": "0",
            "pos": 1,
            "fields": [
                {
                    "MIGX_id": "",
                    "field": "id",
                    "caption": "ID",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "number",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "none",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "class_key",
                    "caption": "Class key",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "none",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "rmTask",
                    "useDefaultIfEmpty": 1,
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "title",
                    "caption": "Title",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "text",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "content",
                    "caption": "Description",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "richtext",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "tags",
                    "caption": "Tags",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "listbox",
                    "validation": "",
                    "configs": {
                        "listWidth": "500",
                        "typeAhead": "true",
                        "typeAheadDelay": "250"
                    },
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "@CHUNK tvSelectInputOption@StatusTask",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                }
            ]
        },
        {
            "MIGX_id": 2,
            "caption": "Properties",
            "print_before_tabs": "0",
            "pos": 2,
            "fields": [
                {
                    "MIGX_id": "",
                    "field": "complexity",
                    "caption": "Complexity",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "option",
                    "validation": "",
                    "configs": {
                        "columns": "20"
                    },
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "@CHUNK tvSelectFibonacci",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "priority",
                    "caption": "Priority",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "option",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "@CHUNK tvSelectInputOption@IssuePriority",
                    "default": "2",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "user_id",
                    "caption": "Assigned to",
                    "description": "Who is best suited to look at this issue?",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "superboxselect",
                    "validation": "",
                    "configs": {
                        "selectType": "users",
                        "maxElements": "1",
                        "allowBlank": "1",
                        "depth": "10",
                        "limitRelatedContext": "0",
                        "pageSize": "10"
                    },
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "date_due",
                    "caption": "Due date",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "date",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "createdby",
                    "caption": "Author",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "number",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "none",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "createdon",
                    "caption": "Date",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "date",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "none",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                }
            ]
        },
        {
            "MIGX_id": 3,
            "caption": "Comments",
            "print_before_tabs": "0",
            "pos": 3,
            "fields": [
                {
                    "MIGX_id": "",
                    "field": "comments",
                    "caption": "Comments",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "migxdb",
                    "validation": "",
                    "configs": "task_comments:romanescobackyard",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                }
            ]
        }
    ],
    "contextmenus": "update||duplicate||recall_remove_delete",
    "actionbuttons": "addItem||bulk||toggletrash||emptyTrash",
    "columnbuttons": "",
    "filters": [
        {
            "MIGX_id": 1,
            "name": "search_task",
            "label": "Search",
            "emptytext": "Search for specific task(s)",
            "type": "textbox",
            "getlistwhere": {
                "title:LIKE": "%[[+search_task]]%",
                "OR:content:LIKE": "%[[+search_task]]%",
                "OR:tags:LIKE": "%[[+search_task]]%"
            },
            "getcomboprocessor": "",
            "combotextfield": "",
            "comboidfield": "",
            "combowhere": "",
            "comboclassname": "",
            "combopackagename": "",
            "combo_use_custom_prefix": "0",
            "comboprefix": "",
            "combojoins": "",
            "comboparent": "",
            "default": ""
        }
    ],
    "extended": {
        "migx_add": "New Task",
        "disable_add_item": "",
        "add_items_directly": "",
        "formcaption": "",
        "update_win_title": "Edit Task",
        "win_id": "tasks",
        "maxRecords": "",
        "addNewItemAt": "top",
        "multiple_formtabs": "",
        "multiple_formtabs_label": "",
        "multiple_formtabs_field": "",
        "multiple_formtabs_optionstext": "",
        "multiple_formtabs_optionsvalue": "",
        "actionbuttonsperrow": 4,
        "winbuttonslist": "",
        "extrahandlers": "",
        "filtersperrow": 4,
        "packageName": "romanescobackyard",
        "classname": "rmTask",
        "task": "",
        "getlistsort": "createdon",
        "getlistsortdir": "DESC",
        "sortconfig": "",
        "gridpagesize": "",
        "use_custom_prefix": "0",
        "prefix": "",
        "grid": "",
        "gridload_mode": 1,
        "check_resid": 0,
        "check_resid_TV": "",
        "join_alias": "",
        "has_jointable": "yes",
        "getlistwhere": "",
        "joins": [
            {
                "alias": "User"
            },{
                "alias": "Author"
            }
        ],
        "hooksnippets": "",
        "cmpmaincaption": "Project Data",
        "cmptabcaption": "Tasks",
        "cmptabdescription": "The tasks in this list are collected from the Status tab on each page and the project timeline on the Dashboard page. But you can also add generic issues here directly.",
        "cmptabcontroller": "",
        "winbuttons": "",
        "onsubmitsuccess": "",
        "submitparams": ""
    },
    "columns": [
        {
            "MIGX_id": "",
            "header": "ID",
            "dataIndex": "id",
            "width": 10,
            "sortable": true,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "Title",
            "dataIndex": "title",
            "width": 50,
            "sortable": "false",
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": "this.textEditor"
        },
        {
            "MIGX_id": "",
            "header": "Description",
            "dataIndex": "content",
            "width": 80,
            "sortable": "false",
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": "this.textEditor"
        },
        {
            "MIGX_id": "",
            "header": "Priority",
            "dataIndex": "priority",
            "width": 20,
            "sortable": true,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": "this.textEditor"
        },
        {
            "MIGX_id": "",
            "header": "Author",
            "dataIndex": "createdby",
            "width": 30,
            "sortable": true,
            "show_in_grid": 0,
            "customrenderer": "",
            "renderer": "this.renderChunk",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "[[+createdby:userinfo=`username`]]",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "Assigned to",
            "dataIndex": "user_id",
            "width": 30,
            "sortable": true,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderChunk",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "[[+user_id:userinfo=`username`]]",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "Created on",
            "dataIndex": "createdon",
            "width": 30,
            "sortable": 1,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderChunk",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "[[+createdon:date=`[[++romanesco.date_format_short]]`]]",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "Due on",
            "dataIndex": "date_due",
            "width": 30,
            "sortable": 1,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderChunk",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "[[+date_due:date=`[[++romanesco.date_format_short]]`]]",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "Parent",
            "dataIndex": "parent_id",
            "width": 30,
            "sortable": true,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderChunk",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "[[+class_key:stripString=`rmTask`:is=`Resource`:then=`<a href='?a=resource/update&id=[[+parent_id]]'>Resource</a>`:else=``]]",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "Comments",
            "dataIndex": "task_id",
            "width": 20,
            "sortable": false,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderChunk",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "[[migxLoopCollection?\n&packageName=`romanescobackyard`\n&classname=`rmTaskComment`\n&where=`{\"task_id\":\"[[+id]]\"}`\n&tpl=`@CODE: [[+total]]`\n&limit=`1`\n]]",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "deleted",
            "dataIndex": "deleted",
            "width": 10,
            "sortable": true,
            "show_in_grid": 0,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": ""
        }
    ],
    "category": ""
}
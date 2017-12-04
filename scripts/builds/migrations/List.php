<?php
/**
 * Created by PhpStorm.
 * User: xitrumhaman
 * Date: 1/19/15
 * Time: 4:25 PM
 */
class MigrationList
{
    /**
     * Return list of migration need to be deployed
     * @return array
     */
    static public function getList()
    {
        return array(
            '_config_active.sql',
            '_init.01.admin_role_table.sql',
            '_init.02.admin_table.sql',
            '_init.07.admin_component.sql',
            '_init.03.admin_module_table.sql',
            '_init.04.admin_resource_table.sql',
            '_init.05.admin_privilege_table.sql',
            '_init.06.admin_acl_table.sql',
            '_admin_permission.sql',
            '2016/08/10/01.language.sql',
            '2016/08/12/03.news_category.sql',
            '2016/08/12/04.news.sql',
            '2016/08/12/05.add_privilege_news.sql',
            '2017/09/19/01.book.sql',
            '2017/09/19/02.modify_column_book_created_at.sql',
            '2017/09/20/01.add_column_is_active_to_book_table.sql',
            '2017/09/19/02.modify_column_book_created_at.sql',
            '2017/09/20/01.book_category.sql',
            '2017/09/20/02.create_category_foreign_key.sql',
        );
    }
}
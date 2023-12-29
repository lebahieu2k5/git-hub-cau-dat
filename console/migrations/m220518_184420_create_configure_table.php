<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%configure}}`.
 */
class m220518_184420_create_configure_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%configure}}', [
            'id' => $this->primaryKey(),
            'label' => $this->text(),
            'name' => $this->string()->unique(),
            'nhom' => $this->string(),
            'value' => $this->text()
        ], $tableOptions);
        $this->insert('configure', ['label' =>'Số bài viết trên một trang','name' =>'post_per_page','nhom' =>'Cấu hình hiển thị','value' =>'']);
        $this->insert('configure', ['label' =>'Số sản phẩm trên một trang','name' =>'product_per_page','nhom' =>'Cấu hình hiển thị','value' =>'']);
        $this->insert('configure', ['label' =>'Số sản phẩm liên quan','name' =>'product_involve','nhom' =>'Cấu hình hiển thị','value' =>'']);
        $this->insert('configure', ['label' =>'Số sản phẩm nổi bật','name' =>'product_highlight','nhom' =>'Cấu hình hiển thị','value' =>'']);
        $this->insert('configure', ['label' =>'Số sản phẩm bán chạy','name' =>'product_best_selling','nhom' =>'Cấu hình hiển thị','value' =>'']);
        $this->insert('configure', ['label' =>'Số sản phẩm hiện trang chủ','name' =>'product_home_page','nhom' =>'Cấu hình hiển thị','value' =>'']);
        $this->insert('configure', ['label' =>'Số tin tức nổi bật','name' =>'news_involve','nhom' =>'Cấu hình hiển thị','value' =>'']);
        $this->insert('configure', ['label' =>'Số tin tức mới nhất','name' =>'news_lastest','nhom' =>'Cấu hình hiển thị','value' =>'']);
        $this->insert('configure', ['label' =>'Tiền tố tiền tệ','name' =>'money_prefix','nhom' =>'Cấu hình chức năng','value' =>'']);
        $this->insert('configure', ['label' =>'Hậu tố tiền tệ','name' =>'money_suffix','nhom' =>'Cấu hình chức năng','value' =>'']);
        $this->insert('configure', ['label' =>'Chuỗi thay thế giá','name' =>'money_replace','nhom' =>'Cấu hình chức năng','value' =>'']);
        $this->insert('configure', ['label' =>'Tên đơn vị/doanh nghiệp','name' =>'company_name','nhom' =>'Cấu hình mail','value' =>'']);
        $this->insert('configure', ['label' =>'Email','name' =>'company_email','nhom' =>'Cấu hình mail','value' =>'']);
        $this->insert('configure', ['label' =>'Password','name' =>'company_password','nhom' =>'Cấu hình mail','value' =>'']);
        $this->insert('configure', ['label' =>'Host mail','name' =>'company_mailhost','nhom' =>'Cấu hình mail','value' =>'']);
        $this->insert('configure', ['label' =>'Mã theo dõi Facebook SKD','name' =>'facebook_sdk','nhom' =>'Cấu hình mạng xã hội','value' =>'']);
        $this->insert('configure', ['label' =>'ID App Facebook','name' =>'facebook_appid','nhom' =>'Cấu hình mạng xã hội','value' =>'']);
        $this->insert('configure', ['label' =>'Liên kết trang facebook','name' =>'facebook_link','nhom' =>'Cấu hình mạng xã hội','value' =>'']);
        $this->insert('configure', ['label' =>'Liên kết MapGoogle Địa chỉ 1','name' =>'google_link','nhom' =>'Cấu hình mạng xã hội','value' =>'']);
        $this->insert('configure', ['label' =>'Liên kết MapGoogle Địa chỉ 2','name' =>'twitter_link','nhom' =>'Cấu hình mạng xã hội','value' =>'']);
        $this->insert('configure', ['label' =>'Liên kết trang youtube','name' =>'youtube_link','nhom' =>'Cấu hình mạng xã hội','value' =>'']);
        $this->insert('configure', ['label' =>'Hộp chat online','name' =>'chat_box','nhom' =>'Hộp chat online','value' =>'']);
        $this->insert('configure', ['label' =>'Tên công ty','name' =>'contact_cname','nhom' =>'Cấu hình liên hệ','value' =>'']);
        $this->insert('configure', ['label' =>'Câu chào mừng','name' =>'contact_slogan1','nhom' =>'Cấu hình khẩu hiệu trang chủ','value' =>'']);
        $this->insert('configure', ['label' =>'Câu chào mừng 2','name' =>'contact_slogan2','nhom' =>'Cấu hình khẩu hiệu trang chủ','value' =>'']);
        $this->insert('configure', ['label' =>'Địa chỉ','name' =>'contact_address','nhom' =>'Cấu hình liên hệ','value' =>'']);
        $this->insert('configure', ['label' =>'Địa chỉ 2','name' =>'contact_address2','nhom' =>'Cấu hình liên hệ','value' =>'']);
        $this->insert('configure', ['label' =>'Email','name' =>'contact_email','nhom' =>'Cấu hình liên hệ','value' =>'']);
        $this->insert('configure', ['label' =>'Điện thoại','name' =>'contact_phone','nhom' =>'Cấu hình liên hệ','value' =>'']);
        $this->insert('configure', ['label' =>'Fax','name' =>'contact_fax','nhom' =>'Cấu hình liên hệ','value' =>'']);
        $this->insert('configure', ['label' =>'Hotline','name' =>'contact_hotline','nhom' =>'Cấu hình liên hệ','value' =>'']);
        $this->insert('configure', ['label' =>'Vị trí','name' =>'local_position','nhom' =>'Local','value' =>'20.942161976593493, 106.32653561720088']);
        $this->insert('configure', ['label' =>'Favicon','name' =>'favicon','nhom' =>'Local','value' =>'']);
        $this->insert('configure', ['label' =>'Logo','name' =>'contact_logo','nhom' =>'Local','value' =>'']);
        $this->insert('configure', ['label' =>'Logo','name' =>'contact_logo_footer','nhom' =>'Local','value' =>'']);
        $this->insert('configure', ['label' =>'Banner quảng cáo trang tin tức','name' =>'ad_news','nhom' =>'Local','value' =>'']);
        $this->insert('configure', ['label' =>'Liên kết Banner quảng cáo trang tin tức','name' =>'ad_news_link','nhom' =>'Local','value' =>'']);
        $this->insert('configure', ['label' =>'Chứng chỉ','name' =>'footer_certificate','nhom' =>'Cấu hình footer','value' =>'']);
        $this->insert('configure', ['label' =>'Liên kết pinterest','name' =>'pinterest_link','nhom' =>'Cấu hình mạng xã hội','value' =>'']);
        $this->insert('configure', ['label' =>'VAT','name' =>'VAT','nhom' =>'Cấu hình chức năng','value' =>'']);
        $this->insert('configure', ['label' =>'Liên kết trang rss','name' =>'rss_link','nhom' =>'Cấu hình mạng xã hội','value' =>'']);
        $this->insert('configure', ['label' =>'Banner quảng cáo trang page','name' =>'page_banner','nhom' =>'Local','value' =>'']);
        $this->insert('configure', ['label' =>'Liên kết banner trang page','name' =>'page_banner_link','nhom' =>'Local','value' =>'']);
        $this->insert('configure', ['label' =>'Nhúng footer (facebook,...)','name' =>'footer_facebook','nhom' =>'Cấu hình footer','value' =>'']);
        $this->insert('configure', ['label' =>'Keyword SEO trang chủ','name' =>'homepage_seo_keyword','nhom' =>'Homepage Seo','value' =>'']);
        $this->insert('configure', ['label' =>'Description SEO trang chủ','name' =>'homepage_seo_description','nhom' =>'Homepage Seo','value' =>'']);
        $this->insert('configure', ['label' =>'Title SEO trang chủ','name' =>'homepage_seo_title','nhom' =>'Homepage Seo','value' =>'']);
        $this->insert('configure', ['label' =>'Tên trang trang chủ','name' =>'homepage_page_title','nhom' =>'Homepage Seo','value' =>'']);
        $this->insert('configure', ['label' =>'Ảnh topbar','name' =>'index_topbar','nhom' =>'Cấu hình trang chủ','value' =>'']);
        $this->insert('configure', ['label' =>'Đường dẫn ảnh topbar','name' =>'index_topbar_link','nhom' =>'Cấu hình trang chủ','value' =>'']);
        $this->insert('configure', ['label' =>'5','name' =>'slide_1592938942','nhom' =>'giaodien','value' =>'']);
        $this->insert('configure', ['label' =>'12','name' =>'slide_1593759267','nhom' =>'giaodien','value' =>'']);
        $this->insert('configure', ['label' =>'Nhúng video giới thiệu trang chủ','name' =>'index_gioithieu_video','nhom' =>'Cấu hình trang chủ','value' =>'']);
        $this->insert('configure', ['label' =>'Câu chào mừng 3','name' =>'contact_slogan3','nhom' =>'Cấu hình khẩu hiệu trang chủ','value' =>'']);
        $this->insert('configure', ['label' =>'client_token_api','name' =>'topup_api_client_token_api','nhom' =>'Cấu hình API Nạp tiền','value' =>'']);
        $this->insert('configure', ['label' =>'client_code_request','name' =>'topup_api_client_code_request','nhom' =>'Cấu hình API Nạp tiền','value' =>'']);
        $this->insert('configure', ['label' =>'Địa chỉ công ty','name' =>'company_address','nhom' =>'Cấu hình liên hệ','value' =>'']);
        $this->insert('configure', ['label' =>'SDT công ty','name' =>'company_phone','nhom' =>'Cấu hình liên hệ','value' =>'']);
        $this->insert('configure', ['label' =>'Lời cảm ơn trên hóa đơn','name' =>'invoice_thank','nhom' =>'Cấu hình hóa đơn','value' =>'']);
        $this->insert('configure', ['label' =>'Điều khoản trên hóa đơn','name' =>'invoice_dieukhoan','nhom' =>'Cấu hình hóa đơn','value' =>'']);
        $this->insert('configure', ['label' =>'Khẩu hiệu 1','name' =>'slogan_1','nhom' =>'Cấu hình khẩu hiệu cốt lõi','value' =>'']);
        $this->insert('configure', ['label' =>'Khẩu hiệu 2','name' =>'slogan_2','nhom' =>'Cấu hình khẩu hiệu cốt lõi','value' =>'']);
        $this->insert('configure', ['label' =>'Khẩu hiệu 3','name' =>'slogan_3','nhom' =>'Cấu hình khẩu hiệu cốt lõi','value' =>'']);
        $this->insert('configure', ['label' =>'Logo','name' =>'contact_slogan_header','nhom' =>'Local','value' =>'']);
        $this->insert('configure', ['label' =>'Logo','name' =>'contact_slogan_header_mobile','nhom' =>'Local','value' =>'']);
        $this->insert('configure', ['label' =>'Bank code','name' =>'bank_code','nhom' =>'Cấu hình API','value' =>'']);
        $this->insert('configure', ['label' =>'Bank account','name' =>'bank_account','nhom' =>'Cấu hình API','value' =>'']);
        $this->insert('configure', ['label' =>'API Token','name' =>'api_token','nhom' =>'Cấu hình API','value' =>'']);
        $this->insert('configure', ['label' =>'Tên Đường Phố','name' =>'company_street','nhom' =>'Cấu hình liên hệ','value' =>'']);
        $this->insert('configure', ['label' =>'Tên Thành Phố','name' =>'company_city','nhom' =>'Cấu hình liên hệ','value' =>'']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%configure}}');
    }
}

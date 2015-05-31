<?php
/*
 * Copyright (C) 2010-2015 Conny Sjöblom <biohzn@mustis.org>
 * Copyright (C) 2010-2015 Arne Jensen   <darkdevil@darkdevil.dk>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<?php
/*
 * Turkish language file.
*/
?>
<?php
$lang = array(

    /* Navigation                           */
    'nav_status'                        => 'Durum',

    'nav_user'                          => 'Kullanıcı',
    'nav_user_settings'                 => 'Ayarlar',
    'nav_user_server'                   => 'Sunucu',
    'nav_user_authsettings'             => 'Auth ayarları',
    'nav_user_away'                     => 'Uzak ol',
    'nav_user_channels'                 => 'Kanallar',
    'nav_user_log'                      => 'Log',

    'nav_vadmin'                        => 'vYönetici',
    'nav_vadmin_users'                  => 'Kullanıcılar',
    'nav_vadmin_adduser'                => 'Kullanıcı ekle',

    'nav_admin'                         => 'Yönetim',
    'nav_admin_users'                   => 'Kullanıcılar',
    'nav_admin_adduser'                 => 'Kullanıcı ekle',
    'nav_admin_trustedips'              => 'Güvenilir IP\'ler',
    'nav_admin_vhosts'                  => 'Vhost\'lar',
    'nav_admin_globalmsg'               => 'Genele mesaj',
    'nav_admin_mainlog'                 => 'Ana log',

    'nav_logout'                        => 'Çıkış',

    'login_username'                    => 'Kullanıcı adı',
    'login_password'                    => 'Şifre',
    'login_server'                      => 'Sunucu',
    'login_submit'                      => 'Giriş',
    'login_wrong_password'              => 'Hatalı kullanıcı adı yada şifre',

    /* Page: status                         */
    'status_uptime'                     => 'Uptime',
    'status_nickname'                   => 'Rumuz',
    'status_disconnected'               => 'Bağlantı kesildi',
    'status_awaynick'                   => 'Uzak rumuzu',
    'status_awaymessage'                => 'Uzak mesajı',
    'status_realname'                   => 'Gerçek isim',
    'status_server'                     => 'Sunucu',
    'status_traffic'                    => 'Trafik',

    /* Page: user->settings                 */
    'user_settings_realname'            => 'Gerçek isim',
    'user_settings_nickname'            => 'Rumuz',
    'user_settings_password'            => 'Şifre',
    'user_settings_sysnotices'          => 'Sistem notları',

    /* Page: user->server                   */
    'user_server_server'                => 'Sunucu',
    'user_server_port'                  => 'Bağlantı noktası',
    'user_server_password'              => 'Şifre',
    'user_server_vhost'                 => 'Vhost',
    'user_server_vhost_custom'          => '...yada kendi vhost\'unuzu tanımlayın',
    'user_server_jump'                  => 'Atla',
    'user_server_reconnecting'          => 'Bouncer\'a yeniden bağlanıyor...',

    /* Page: user->auth                     */
    'user_auth_username'                => 'Kullanıcı adı',
    'user_auth_password'                => 'Şifre',
    'user_auth_auto'                    => 'Oto auth',

    /* Page: user->away                     */
    'user_away_awaynick'                => 'Uzak rumuzu',
    'user_away_awaymessage'             => 'Uzak Mesajı',
    'user_away_usequitasaway'           => 'Uzak olma gibi gıkış',

    /* Page: user->channels                 */
    'user_channels_join_chan'           => 'Kanala Gir',
    'user_channels_channel'             => 'Kanal',
    'user_channels_modes'               => 'Modlar',
    'user_channels_action'              => 'Aktiviteler',
    'user_channels_join'                => 'Gir',
    'user_channels_part'                => 'Ayrıl',
    'user_channels_join_ok'             => '%s Kanalına başarıyla girildi',
    'user_channels_part_ok'             => '%s Kanalından başarıyla ayrılındı',
    'user_channels_not_connected'       => 'IRC\'ye bağlı değilsiniz.',
    'user_channels_already_maxchannels' => 'Halihazırda %d kanala girdiniz.',

    /* Page: user->log                      */
    'user_log_empty'                    => 'Log boş',
    'user_log_erase'                    => 'Sil log',
    'user_log_erased'                   => 'Log başarıyla silindi',

    /* Page: admin->userlist                */
    'admin_users_title_admins'          => 'Yöneticiler',
    'admin_users_title_users'           => 'Kullanıcılar',
    'admin_users_username'              => 'Kullanıcı adı',
    'admin_users_nickname'              => 'Rumuz',
    'admin_users_last_seen'             => 'Son görülme',
    'admin_users_seen_never'            => 'Asla',
    'admin_users_seen_now'              => 'Şimdi',
    'admin_users_user_deleted'          => 'Kullanıcı %s başarıyla silindi',
    'admin_users_confirm_delete'        => 'Bu kullanıcıyı gerçekten silmek istiyor musunuz?',
    'admin_users_action'                => 'Aktiviteler',
    'admin_users_end_admins'            => '%d Yöneticileri',
    'admin_users_end_users'             => '%d düz kullanıcılar',

    /* Page: admin->userlist->edit          */
    'admin_users_edit_title'            => '<b>%s</b> için seçenekler değişiyor.',
    'admin_users_edit_access'           => 'Yetki',
    'admin_users_rank_admin'            => 'Yönetici',
    'admin_users_rank_user'             => 'Kullanıcı',
    'admin_users_edit_realname'         => 'Gerçek isim',
    'admin_users_edit_nickname'         => 'Rumuz',
    'admin_users_edit_password'         => 'Şifre',
    'admin_users_edit_server'           => 'Sunucu',
    'admin_users_edit_port'             => 'Bağlantı noktası',
    'admin_users_edit_serverpass'       => 'Sunucu şifresi',
    'admin_users_edit_awaynick'         => 'Uzak rumuzu',
    'admin_users_edit_awaymessage'      => 'Uzak mesajı',
    'admin_users_edit_quitasaway'       => 'Çıkışı uzak gibi kullan',
    'admin_users_edit_vhost'            => 'Vhost',
    'admin_users_edit_vhost_custom'     => '...yada kendi vhost\'unuzu tanımlayın',
    'admin_users_edit_jump'             => 'Atla',
    'admin_users_edit_invaliduser'      => '\'%s\' kullanıcısı geçerli değil.',
    'admin_users_edit_reconnecting'     => 'bouncer\'a yeniden bağlanılıyor \'%s\'...',

    /* Page: admin->adduser                 */
    'admin_adduser_username'            => 'Kullanıcı adı',
    'admin_adduser_password'            => 'Gerçek isim',
    'admin_adduser_ifPwEmpty'           => 'NOT. eğer şifre bölümü boş bırakılırsa, gelişigüzel şifre oluşturulur.',
    'admin_adduser_submit'              => 'Kullanıcı ekle',
    'admin_adduser_user_added'          => '%s kullanıcısı, %s şifresiyle eklendi.',

    /* Page: admin->trustedips              */
    'admin_trustedips_ip'               => 'IP',
    'admin_trustedips_action'           => 'Aktiviteler',
    'admin_trustedips_added'            => 'Güvenilir IP eklendi.',
    'admin_trustedips_removed'          => 'Güvenilir IP kaldırıldı.',
    'admin_trustedips_already'          => 'Güvenilir IP zaten ekli.',
    'admin_trustedips_ip_invalid'       => 'Girdiğiniz IP geçerli değil.',

    /* Page: admin->vhosts                  */
    'admin_vhosts_ip'                   => 'IP',
    'admin_vhosts_userlimit'            => 'Kullanıcı sınırı',
    'admin_vhosts_host'                 => 'Host',
    'admin_vhosts_users'                => 'Kullanıcılar',
    'admin_vhosts_action'               => 'Aktiviteler',
    'admin_vhosts_ip_invalid'           => 'Girdiğiniz IP geçerli değil',
    'admin_vhosts_added'                => 'Yeni vhost başarıyla eklendi',
    'admin_vhosts_removed'              => 'Vhost başarıyla kaldırıldı',
    'admin_vhosts_numerical'            => 'Girilmiş sınır geçerli bir sayı değil',

    /* Page: admin->globalmsg               */
    'admin_globalmsg_message'           => 'Mesaj',
    'admin_globalmsg_submit'            => 'İlet',
    'admin_globalmsg_ok'                => 'Mesaj başarıyla iletildi.',

    /* Page: admin->mainlog                 */
    'admin_mainlog_empty'               => 'Log boş',
    'admin_mainlog_erase'               => 'Log sil',
    'admin_mainlog_erased'              => 'Log başarıyla silindi',

    /* Misc stuff                           */
    'misc_trustedips_auto_add'          => 'web sunucusu (%s) güvenilir IP\'lere otomatik olarak eklendi',
    'misc_save_changes'                 => 'Değişiklikleri sakla',
    'misc_save_ok'                      => 'Ayarlar saklandı.',
    'misc_yes'                          => 'Evet',
    'misc_no'                           => 'Hayır',
    'misc_on'                           => 'Açık',
    'misc_off'                          => 'Kapalı',

    'misc_days'                         => 'günler',
    'misc_hours'                        => 'saatler',
    'misc_minutes'                      => 'dakikalar',
    'misc_seconds'                      => 'saniyeler',

    'misc_403'                          =>  'Bu sayfaya giriş yetkiniz yok',
    'misc_404'                          =>  '\'%s\' sayfası bulunamadı',
);
?>

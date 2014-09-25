<?php
/*
 * Copyright (C) 2010-2014 Conny Sjöblom <biohzn@mustis.org>
 * Copyright (C) 2010-2014 Arne Jensen   <darkdevil@darkdevil.dk>
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
 * English language file.
*/
?>
<?php
$lang = array(

    /* Navigation                           */
    'nav_status'                    => 'Status',

    'nav_user'                      => 'User',
    'nav_user_settings'             => 'Settings',
    'nav_user_server'               => 'Server',
    'nav_user_authsettings'         => 'Auth settings',
    'nav_user_away'                 => 'Away',
    'nav_user_channels'             => 'Channels',
    'nav_user_log'                  => 'Log',

    'nav_vadmin'                    => 'vAdmin',
    'nav_vadmin_users'              => 'Users',
    'nav_vadmin_adduser'            => 'Add user',

    'nav_admin'                     => 'Administrator',
    'nav_admin_users'               => 'Users',
    'nav_admin_adduser'             => 'Add user',
    'nav_admin_trustedips'          => 'Trusted IPs',
    'nav_admin_vhosts'              => 'Vhosts',
    'nav_admin_globalmsg'           => 'Global message',
    'nav_admin_mainlog'             => 'Mainlog',

    'nav_logout'                    => 'Logout',

    'login_username'                => 'Username',
    'login_password'                => 'Password',
    'login_server'                  => 'Server',
    'login_submit'                  => 'Log in',
    'login_wrong_password'          => 'Wrong username or password',

    /* Page: status                         */
    'status_uptime'                 => 'Uptime',
    'status_nickname'               => 'Nickname',
    'status_disconnected'           => 'Disconnected',
    'status_awaynick'               => 'Away nick',
    'status_awaymessage'            => 'Away message',
    'status_realname'               => 'Realname',
    'status_server'                 => 'Server',
    'status_traffic'                => 'Traffic',

    /* Page: user->settings                 */
    'user_settings_realname'        => 'Realname',
    'user_settings_nickname'        => 'Nickname',
    'user_settings_password'        => 'Password',
    'user_settings_sysnotices'      => 'System notices',

    /* Page: user->server                   */
    'user_server_server'            => 'Server',
    'user_server_port'              => 'Port',
    'user_server_password'          => 'Password',
    'user_server_vhost'             => 'Vhost',
    'user_server_vhost_custom'      => '...or define your own vhost',
    'user_server_jump'              => 'Jump',
    'user_server_reconnecting'      => 'Reconnecting bouncer...',

    /* Page: user->auth                     */
    'user_auth_username'            => 'Username',
    'user_auth_password'            => 'Password',
    'user_auth_auto'                => 'Auto auth',

    /* Page: user->away                     */
    'user_away_awaynick'            => 'Away nick',
    'user_away_awaymessage'         => 'Away message',
    'user_away_usequitasaway'       => 'Use quit as away',

    /* Page: user->channels                 */
    'user_channels_join_chan'       => 'Join channel',
    'user_channels_channel'         => 'Channel',
    'user_channels_modes'           => 'Modes',
    'user_channels_action'          => 'Actions',
    'user_channels_join'            => 'Join',
    'user_channels_part'            => 'Part',
    'user_channels_join_ok'         => 'Successfully joined channel %s',
    'user_channels_part_ok'         => 'Successfully left channel %s',
    'user_channels_not_connected'   => 'You are not connected to IRC.',
    'user_channels_already_20chans' => 'You have already joined 20 channels.',

    /* Page: user->log                      */
    'user_log_empty'                => 'Log empty',
    'user_log_erase'                => 'Empty log',
    'user_log_erased'               => 'Log successfully erased',

    /* Page: admin->userlist                */
    'admin_users_title_admins'      => 'Administrators',
    'admin_users_title_users'       => 'Users',
    'admin_users_username'          => 'Username',
    'admin_users_nickname'          => 'Nickname',
    'admin_users_last_seen'         => 'Last seen',
    'admin_users_seen_never'        => 'Never',
    'admin_users_seen_now'          => 'Now',
    'admin_users_user_deleted'      => 'User %s successfully deleted',
    'admin_users_confirm_delete'    => 'Do you really want to delete the user?',
    'admin_users_action'            => 'Actions',
    'admin_users_end_admins'        => '%d administrators',
    'admin_users_end_users'         => '%d regular users',

    /* Page: admin->userlist->edit          */
    'admin_users_edit_title'        => 'Changing options for <b>%s</b>',
    'admin_users_edit_access'       => 'Access',
    'admin_users_rank_admin'        => 'Administrator',
    'admin_users_rank_user'         => 'User',
    'admin_users_edit_realname'     => 'Realname',
    'admin_users_edit_nickname'     => 'Nickname',
    'admin_users_edit_password'     => 'Password',
    'admin_users_edit_server'       => 'Server',
    'admin_users_edit_port'         => 'Port',
    'admin_users_edit_serverpass'   => 'Server password',
    'admin_users_edit_awaynick'     => 'Away nick',
    'admin_users_edit_awaymessage'  => 'Away message',
    'admin_users_edit_quitasaway'   => 'Use quit as away',
    'admin_users_edit_vhost'        => 'Vhost',
    'admin_users_edit_vhost_custom' => '...or define your own vhost',
    'admin_users_edit_jump'         => 'Jump',
    'admin_users_edit_invaliduser'  => 'User \'%s\' is not valid',
    'admin_users_edit_reconnecting' => 'Reconnecting bouncer \'%s\'...',

    /* Page: admin->adduser                 */
    'admin_adduser_username'        => 'Username',
    'admin_adduser_password'        => 'Password',
    'admin_adduser_ifPwEmpty'       => 'NOTE. If password field is left empty, a random password is generated.',
    'admin_adduser_submit'          => 'Add user',
    'admin_adduser_user_added'      => 'User %s added, with the password: %s',

    /* Page: admin->trustedips              */
    'admin_trustedips_ip'           => 'IP',
    'admin_trustedips_action'       => 'Actions',
    'admin_trustedips_added'        => 'Trusted IP added',
    'admin_trustedips_removed'      => 'Trusted IP removed',
    'admin_trustedips_already'      => 'Trusted IP already added',
    'admin_trustedips_ip_invalid'   => 'The IP you entered is not valid',

    /* Page: admin->vhosts                  */
    'admin_vhosts_ip'               => 'IP',
    'admin_vhosts_userlimit'        => 'User limit',
    'admin_vhosts_host'             => 'Host',
    'admin_vhosts_users'            => 'Users',
    'admin_vhosts_action'           => 'Actions',
    'admin_vhosts_ip_invalid'       => 'The IP you entered is not valid',
    'admin_vhosts_added'            => 'New vhost successfully added',
    'admin_vhosts_removed'          => 'Vhost successfully removed',
    'admin_vhosts_numerical'        => 'Entered limit is not numerical',

    /* Page: admin->globalmsg               */
    'admin_globalmsg_message'       => 'Message',
    'admin_globalmsg_submit'        => 'Send',
    'admin_globalmsg_ok'            => 'Message successfully sent',

    /* Page: admin->mainlog                 */
    'admin_mainlog_empty'           => 'Log empty',
    'admin_mainlog_erase'           => 'Empty log',
    'admin_mainlog_erased'          => 'Log successfully erased',

    /* Misc stuff                           */
    'misc_trustedips_auto_add'      => 'Automaticly added webserver (%s) to trusted IP\'s',
    'misc_save_changes'             => 'Save changes',
    'misc_save_ok'                  => 'Settings saved.',
    'misc_yes'                      => 'Yes',
    'misc_no'                       => 'No',
    'misc_on'                       => 'On',
    'misc_off'                      => 'Off',

    'misc_days'                     => 'days',
    'misc_hours'                    => 'hours',
    'misc_minutes'                  => 'minutes',
    'misc_seconds'                  => 'seconds',

    'misc_403'                      =>  'You do not have access to this page',
    'misc_404'                      =>  'Page \'%s\' not found',
);
?>

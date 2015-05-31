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
 * Danish language file.
*/
?>
<?php
$lang = array(

    /* Navigation                           */
    'nav_status'                        => 'Status',

    'nav_user'                          => 'Bruger',
    'nav_user_settings'                 => 'Indstillinger',
    'nav_user_server'                   => 'Server',
    'nav_user_authsettings'             => 'Auth indstillinger',
    'nav_user_away'                     => 'Away',
    'nav_user_channels'                 => 'Kanaler',
    'nav_user_log'                      => 'Log',

    'nav_vadmin'                        => 'vAdmin',
    'nav_vadmin_users'                  => 'Brugerliste',
    'nav_vadmin_adduser'                => 'Tilføj bruger',

    'nav_admin'                         => 'Administrator',
    'nav_admin_users'                   => 'Brugerliste',
    'nav_admin_adduser'                 => 'Tilføj bruger',
    'nav_admin_trustedips'              => 'Betroet IP\'er',
    'nav_admin_vhosts'                  => 'Vhosts',
    'nav_admin_globalmsg'               => 'Global besked',
    'nav_admin_mainlog'                 => 'Mainlog',

    'nav_logout'                        => 'Logout',

    'login_username'                    => 'Brugernavn',
    'login_password'                    => 'Adgangskode',
    'login_server'                      => 'Server',
    'login_submit'                      => 'Log ind',
    'login_wrong_password'              => 'Forkert brugernavn eller adgangskode',

    /* Page: status                         */
    'status_uptime'                     => 'Oppetid',
    'status_nickname'                   => 'Nickname',
    'status_disconnected'               => 'Ingen forbindelse',
    'status_awaynick'                   => 'Away nick',
    'status_awaymessage'                => 'Away besked',
    'status_realname'                   => 'Rigtigt navn',
    'status_server'                     => 'Server',
    'status_traffic'                    => 'Trafik',

    /* Page: user->settings                 */
    'user_settings_realname'            => 'Rigtigt navn',
    'user_settings_nickname'            => 'Nickname',
    'user_settings_password'            => 'Adgangskode',
    'user_settings_sysnotices'          => 'System beskeder',

    /* Page: user->server                   */
    'user_server_server'                => 'Server',
    'user_server_port'                  => 'Port',
    'user_server_password'              => 'Adgangskode',
    'user_server_vhost'                 => 'Vhost',
    'user_server_vhost_custom'          => '...eller definer dit eget vhost',
    'user_server_jump'                  => 'Jump',
    'user_server_reconnecting'          => 'Genopretter IRC forbindelsen...',

    /* Page: user->auth                     */
    'user_auth_username'                => 'Brugernavn',
    'user_auth_password'                => 'Adgangskode',
    'user_auth_auto'                    => 'Auto auth',

    /* Page: user->away                     */
    'user_away_awaynick'                => 'Away nick',
    'user_away_awaymessage'             => 'Away besked',
    'user_away_usequitasaway'           => 'Brug afslutningsmeddelelsen som away besked',

    /* Page: user->channels                 */
    'user_channels_join_chan'           => 'Join kanal',
    'user_channels_channel'             => 'Kanal',
    'user_channels_modes'               => 'Modes',
    'user_channels_action'              => 'Muligheder',
    'user_channels_join'                => 'Join',
    'user_channels_part'                => 'Forlad',
    'user_channels_join_ok'             => 'Du har nu joined %s.',
    'user_channels_part_ok'             => 'Du har nu forladt %s.',
    'user_channels_not_connected'       => 'Du er ikke forbundet til IRC.',
    'user_channels_already_maxchannels' => 'Du er allerede på %d kanaler.',

    /* Page: user->log                      */
    'user_log_empty'                    => 'Logfilen er tom',
    'user_log_erase'                    => 'Tøm log',
    'user_log_erased'                   => 'Loggen blev renset med success',

    /* Page: admin->userlist                */
    'admin_users_title_admins'          => 'Administratore',
    'admin_users_title_users'           => 'Brugere',
    'admin_users_username'              => 'Brugernavn',
    'admin_users_nickname'              => 'Nickname',
    'admin_users_last_seen'             => 'Sidst set',
    'admin_users_seen_never'            => 'Aldrig',
    'admin_users_seen_now'              => 'Online lige nu',
    'admin_users_user_deleted'          => 'Brugeren %s blev slettet med success.',
    'admin_users_confirm_delete'        => 'Er du sikker på du vil slette brugeren?',
    'admin_users_action'                => 'Muligheder',
    'admin_users_end_admins'            => '%d administratore',
    'admin_users_end_users'             => '%d normale brugere',

    /* Page: admin->userlist->edit          */
    'admin_users_edit_title'            => 'Ændre indstillinger for <b>%s</b>',
    'admin_users_edit_access'           => 'Adgangsniveau',
    'admin_users_rank_admin'            => 'Administrator',
    'admin_users_rank_user'             => 'Bruger',
    'admin_users_edit_realname'         => 'Rigtigt navn',
    'admin_users_edit_nickname'         => 'Nickname',
    'admin_users_edit_password'         => 'Adgangskode',
    'admin_users_edit_server'           => 'Server',
    'admin_users_edit_port'             => 'Port',
    'admin_users_edit_serverpass'       => 'Server adgangskode',
    'admin_users_edit_awaynick'         => 'Away nick',
    'admin_users_edit_awaymessage'      => 'Away besked',
    'admin_users_edit_quitasaway'       => 'Brug afslutningsmeddelelsen som away besked',
    'admin_users_edit_vhost'            => 'Vhost',
    'admin_users_edit_vhost_custom'     => '...eller definer dit eget vhost',
    'admin_users_edit_jump'             => 'Jump',
    'admin_users_edit_invaliduser'      => 'Brugeren \'%s\' er ikke gyldig',
    'admin_users_edit_reconnecting'     => 'Genopretter IRC forbindelse for bouncer \'%s\'...',

    /* Page: admin->adduser                 */
    'admin_adduser_username'            => 'Brugernavn',
    'admin_adduser_password'            => 'Adgangskode',
    'admin_adduser_ifPwEmpty'           => 'NOTE: Hvis adgangskode feltet efterlades tomt, vil der blive genereret en tilfældig adgangskode',
    'admin_adduser_submit'              => 'Tilføj bruger',
    'admin_adduser_user_added'          => 'Brugeren %s blev tilføjet med adgangskode: %s',

    /* Page: admin->trustedips              */
    'admin_trustedips_ip'               => 'IP',
    'admin_trustedips_action'           => 'Muligheder',
    'admin_trustedips_added'            => 'IP\'en er tilføjet til listen over betroede adresser',
    'admin_trustedips_removed'          => 'IP\'en er fjernet fra listen over betroede adresser',
    'admin_trustedips_already'          => 'IP\'en er allerede på listen over betroede adresser',
    'admin_trustedips_ip_invalid'       => 'Den indtastede IP er ugyldig.',

    /* Page: admin->vhosts                  */
    'admin_vhosts_ip'                   => 'IP',
    'admin_vhosts_userlimit'            => 'Brugergrænse',
    'admin_vhosts_host'                 => 'Host',
    'admin_vhosts_users'                => 'Brugere',
    'admin_vhosts_action'               => 'Muligheder',
    'admin_vhosts_ip_invalid'           => 'Den indtastede IP er ugyldig.',
    'admin_vhosts_added'                => 'Det nye vhost blev tilføjet med success.',
    'admin_vhosts_removed'              => 'Vhost\'et blev slettet med success.',
    'admin_vhosts_numerical'            => 'Den indtastede grænse er ikke numerisk.',

    /* Page: admin->globalmsg               */
    'admin_globalmsg_message'           => 'Besked',
    'admin_globalmsg_submit'            => 'Send',
    'admin_globalmsg_ok'                => 'Beskeden blev sendt med success.',

    /* Page: admin->mainlog                 */
    'admin_mainlog_empty'               => 'Logfilen er tom',
    'admin_mainlog_erase'               => 'Tøm log',
    'admin_mainlog_erased'              => 'Loggen blev renset med success',

    /* Misc stuff                           */
    'misc_trustedips_auto_add'          => 'Webserver adressen (%s) blev automatisk tilføjet til listen over adresser der er tillid til.',
    'misc_save_changes'                 => 'Gem indstillinger',
    'misc_save_ok'                      => 'Indstillingerne blev gemt.',
    'misc_yes'                          => 'Ja',
    'misc_no'                           => 'Nej',
    'misc_on'                           => 'Tændt',
    'misc_off'                          => 'Slukket',

    'misc_days'                         => 'dage',
    'misc_hours'                        => 'timer',
    'misc_minutes'                      => 'minutter',
    'misc_seconds'                      => 'sekunder',

    'misc_403'                          =>  'Du har ikke tilstrækkelig adgang til denne side.',
    'misc_404'                          =>  'Siden \'%s\' blev ikke fundet',
);
?>

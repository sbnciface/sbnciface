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
 * German language file.
 * by André Friedrich <info@andre-friedrich.eu>
 *    Marco Schaefer  <ChuckY@iZ-Smart.net>
*/
?>
<?php
$lang = array(

    /* Navigation                           */
    'nav_status'                        => 'Status',

    'nav_user'                          => 'Benutzer',
    'nav_user_settings'                 => 'Einstellungen',
    'nav_user_server'                   => 'Server',
    'nav_user_authsettings'             => 'Auth Einstellungen',
    'nav_user_away'                     => 'Away',
    'nav_user_channels'                 => 'Räume',
    'nav_user_log'                      => 'Log',

    'nav_admin'                         => 'Administrator',
    'nav_admin_users'                   => 'Benutzer',
    'nav_admin_adduser'                 => 'Benutzer hinzufügen',
    'nav_admin_trustedips'              => 'Trusted IPs',
    'nav_admin_vhosts'                  => 'vHosts',
    'nav_admin_globalmsg'               => 'Globale Nachricht',
    'nav_admin_mainlog'                 => 'Haupt-Log',

    'nav_logout'                        => 'Abmelden',

    'login_username'                    => 'Benutzername',
    'login_password'                    => 'Passwort',
    'login_server'                      => 'Server',
    'login_submit'                      => 'Anmelden',
    'login_wrong_password'              => 'Falscher Benutzername oder Passwort',

    /* Page: status                         */
    'status_uptime'                     => 'Laufzeit',
    'status_nickname'                   => 'Nickname',
    'status_disconnected'               => 'nicht verbunden',
    'status_awaynick'                   => 'Away-Nick',
    'status_awaymessage'                => 'Away-Nachricht',
    'status_realname'                   => 'Realer Name',
    'status_server'                     => 'Server',
    'status_traffic'                    => 'Traffic',

    /* Page: user->settings                 */
    'user_settings_realname'            => 'Realer Name',
    'user_settings_nickname'            => 'Nickname',
    'user_settings_password'            => 'Passwort',
    'user_settings_sysnotices'          => 'Systemnachrichten',

    /* Page: user->server                   */
    'user_server_server'                => 'Server',
    'user_server_port'                  => 'Port',
    'user_server_password'              => 'Passwort',
    'user_server_vhost'                 => 'vHost',
    'user_server_vhost_custom'          => '...oder eigenen vHost definieren',
    'user_server_jump'                  => 'Jump',
    'user_server_reconnecting'          => 'Verbinde Bouncer neu...',

    /* Page: user->auth                     */
    'user_auth_username'                => 'Benutzername',
    'user_auth_password'                => 'Passwort',
    'user_auth_auto'                    => 'Auto-Ident',

    /* Page: user->away                     */
    'user_away_awaynick'                => 'Away-Nick',
    'user_away_awaymessage'             => 'Away-Nachricht',
    'user_away_usequitasaway'           => 'Quit-Message des Client als Away-Nachricht nutzen',

    /* Page: user->channels                 */
    'user_channels_join_chan'           => 'Channel-Verwaltung',
    'user_channels_channel'             => 'Raum',
    'user_channels_modes'               => 'Modi',
    'user_channels_action'              => 'Aktionen',
    'user_channels_join'                => 'betreten',
    'user_channels_part'                => 'verlassen',
    'user_channels_join_ok'             => '%s erfolgreich betreten',
    'user_channels_part_ok'             => '%s erfolgreich verlassen',
    'user_channels_not_connected'       => 'Sie sind nicht mit dem IRC verbunden.',
    'user_channels_already_maxchannels' => 'Du bist bereits in %d Räumen.',

    /* Page: user->log                      */
    'user_log_empty'                    => 'Das Logfile ist leer',
    'user_log_erase'                    => 'Logfile löschen',
    'user_log_erased'                   => 'Logfile erfolgreich gelöscht',

    /* Page: admin->userlist                */
    'admin_users_title_admins'          => 'Administratoren',
    'admin_users_title_users'           => 'Benutzer',
    'admin_users_username'              => 'Benutzername',
    'admin_users_nickname'              => 'Nickname',
    'admin_users_last_seen'             => 'zuletzt online',
    'admin_users_seen_never'            => 'noch nie',
    'admin_users_seen_now'              => 'jetzt',
    'admin_users_user_deleted'          => 'Benutzer %s erfolgreich gelöscht',
    'admin_users_confirm_delete'        => 'Möchten Sie diesen Benutzer wirklich löschen?',
    'admin_users_action'                => 'Aktionen',
    'admin_users_end_admins'            => '%d Administratoren',
    'admin_users_end_users'             => '%d Benutzer',

    /* Page: admin->userlist->edit          */
    'admin_users_edit_title'            => 'Ändere Optionen für Benutzer <b>%s</b>',
    'admin_users_edit_access'           => 'Zugriff',
    'admin_users_rank_admin'            => 'Administrator',
    'admin_users_rank_user'             => 'Benutzer',
    'admin_users_edit_realname'         => 'realer Name',
    'admin_users_edit_nickname'         => 'Nickname',
    'admin_users_edit_password'         => 'Passwort',
    'admin_users_edit_server'           => 'Server',
    'admin_users_edit_port'             => 'Port',
    'admin_users_edit_serverpass'       => 'Server Passwort',
    'admin_users_edit_awaynick'         => 'Away Nick',
    'admin_users_edit_awaymessage'      => 'Away Nachricht',
    'admin_users_edit_quitasaway'       => 'Quitmsg als Away nutzen',
    'admin_users_edit_vhost'            => 'vHost',
    'admin_users_edit_vhost_custom'     => '...oder eigenen vHost definieren',
    'admin_users_edit_jump'             => 'Jump',
    'admin_users_edit_invaliduser'      => 'Der Benutzername \'%s\' ist ungültig',
    'admin_users_edit_reconnecting'     => 'Verbinde Bouncer \'%s\' neu ...',

    /* Page: admin->adduser                 */
    'admin_adduser_username'            => 'Benutzername',
    'admin_adduser_password'            => 'Passwort',
    'admin_adduser_ifPwEmpty'           => 'Achtung: Wenn Sie kein Passwort eintragen, wird ein zufälliges generiert.',
    'admin_adduser_submit'              => 'Benutzer hinzufügen',
    'admin_adduser_user_added'          => 'Benutzer %s hinzugefügt mit folgendem Passwort: %s',

    /* Page: admin->trustedips              */
    'admin_trustedips_ip'               => 'IP',
    'admin_trustedips_action'           => 'Aktionen',
    'admin_trustedips_added'            => 'Trusted IP hinzugefügt',
    'admin_trustedips_removed'          => 'Trusted IP gelöscht',
    'admin_trustedips_already'          => 'Trusted IP bereits hinzugefügt',
    'admin_trustedips_ip_invalid'       => 'Die eingegebene IP ist ungültig!',

    /* Page: admin->vhosts                  */
    'admin_vhosts_ip'                   => 'IP',
    'admin_vhosts_userlimit'            => 'max. Benutzer pro Host',
    'admin_vhosts_host'                 => 'Host',
    'admin_vhosts_users'                => 'Benutzer',
    'admin_vhosts_action'               => 'Aktionen',
    'admin_vhosts_ip_invalid'           => 'Die eingegebene IP ist ungültig!',
    'admin_vhosts_added'                => 'neuen vHost erfolgreich angelegt',
    'admin_vhosts_removed'              => 'vHost erfolgreich gelöscht',
    'admin_vhosts_numerical'            => 'Das eingegebene Limit ist nicht numerisch!',

    /* Page: admin->globalmsg               */
    'admin_globalmsg_message'           => 'Nachricht',
    'admin_globalmsg_submit'            => 'senden',
    'admin_globalmsg_ok'                => 'Nachricht erfolgreich versandt',

    /* Page: admin->mainlog                 */
    'admin_mainlog_empty'               => 'Das Logfile ist leer',
    'admin_mainlog_erase'               => 'Logfile löschen',
    'admin_mainlog_erased'              => 'Logfile erfolgreich gelöscht',

    /* Misc stuff                           */
    'misc_trustedips_auto_add'          => 'Die IP (%s) Ihres Webservers wurde automatisch zu den trusted IP\'s hinzugefügt',
    'misc_save_changes'                 => 'Einstellungen speichern',
    'misc_save_ok'                      => 'Einstellungen erfolgreich gespeichert.',
    'misc_yes'                          => 'Ja',
    'misc_no'                           => 'Nein',
    'misc_on'                           => 'An',
    'misc_off'                          => 'Aus',

    'misc_days'                         => 'Tag(e)',
    'misc_hours'                        => 'Std.',
    'misc_minutes'                      => 'Min.',
    'misc_seconds'                      => 'Sek.',

    'misc_403'                          =>  'Sie haben keine Berechtigung diese Seite anzuzeigen.',
    'misc_404'                          =>  'Seite \'%s\' nicht gefunden',
);
?>

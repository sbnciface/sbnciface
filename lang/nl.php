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
 * Nederlandse taal bestand.
 * door Bob Quaedackers <bquaed@hotmail.com>
 * Yorick Gruijthuijzen <yorick-1989@hotmail.com>
*/
?>
<?php
$lang = array(

    /* Navigation                           */
    'nav_status'                        => 'Status',

    'nav_user'                          => 'Gebruiker',
    'nav_user_settings'                 => 'Instellingen',
    'nav_user_server'                   => 'Server',
    'nav_user_authsettings'             => 'Auth instellingen',
    'nav_user_away'                     => 'Niet aanwezig',
    'nav_user_channels'                 => 'Kanalen',
    'nav_user_log'                      => 'Log',

    'nav_vadmin'                        => 'vAdmin',
    'nav_vadmin_users'                  => 'Gebruikers',
    'nav_vadmin_adduser'                => 'Gebruiker toevoegen',

    'nav_admin'                         => 'Administrator',
    'nav_admin_users'                   => 'Gebruikers',
    'nav_admin_adduser'                 => 'Gebruiker toevoegen',
    'nav_admin_trustedips'              => 'Vertrouwde IP-adressen',
    'nav_admin_vhosts'                  => 'Vhosts',
    'nav_admin_globalmsg'               => 'Globale melding',
    'nav_admin_mainlog'                 => 'Hoofdlog',

    'nav_logout'                        => 'Uitloggen',

    'login_username'                    => 'Gebruikersnaam',
    'login_password'                    => 'Wachtwoord',
    'login_server'                      => 'Server',
    'login_submit'                      => 'Inloggen',
    'login_wrong_password'              => 'Verkeerde gebruikersnaam of wachtwoord',

    /* Page: status                         */
    'status_uptime'                     => 'Uptime',
    'status_nickname'                   => 'Nickname',
    'status_disconnected'               => 'Disconnected',
    'status_awaynick'                   => 'Afwezigheids nick',
    'status_awaymessage'                => 'Afwezigheids melding',
    'status_realname'                   => 'Realname',
    'status_server'                     => 'Server',
    'status_traffic'                    => 'Dataverkeer',

    /* Page: user->settings                 */
    'user_settings_realname'            => 'Realname',
    'user_settings_nickname'            => 'Nickname',
    'user_settings_password'            => 'Wachtwoord',
    'user_settings_sysnotices'          => 'Systeem meldingen',

    /* Page: user->server                   */
    'user_server_server'                => 'Server',
    'user_server_port'                  => 'Poort',
    'user_server_password'              => 'Wachtwoord',
    'user_server_vhost'                 => 'Vhost',
    'user_server_vhost_custom'          => '...of kies je eigen vhost',
    'user_server_jump'                  => 'Jump',
    'user_server_reconnecting'          => 'Reconnecting bouncer...',

    /* Page: user->auth                     */
    'user_auth_username'                => 'Gberuikersnaam',
    'user_auth_password'                => 'Wachtwoord',
    'user_auth_auto'                    => 'Auto auth',

    /* Page: user->away                     */
    'user_away_awaynick'                => 'Afwezigheids nick',
    'user_away_awaymessage'             => 'Afwezigheids melding',
    'user_away_usequitasaway'           => 'Gebruik quit als offline',

    /* Page: user->channels                 */
    'user_channels_join_chan'           => 'Kanaal in gaan',
    'user_channels_channel'             => 'Kanaal',
    'user_channels_modes'               => 'Modes',
    'user_channels_action'              => 'Acties',
    'user_channels_join'                => 'Join',
    'user_channels_part'                => 'Verlaat',
    'user_channels_join_ok'             => 'Je bent succesvol het kanaal binnen gegaan %s',
    'user_channels_part_ok'             => 'Je hebt succesvol het kanaal verlaten %s',
    'user_channels_not_connected'       => 'Je bent niet geconnect naar IRC.',
    'user_channels_already_maxchannels' => 'Je zit al in %d Kanalen.',

    /* Page: user->log                      */
    'user_log_empty'                    => 'Log is leeg',
    'user_log_erase'                    => 'Verwijder log',
    'user_log_erased'                   => 'Log succesvol verwijderd',

    /* Page: admin->userlist                */
    'admin_users_title_admins'          => 'Administrators',
    'admin_users_title_users'           => 'Gebruikers',
    'admin_users_username'              => 'Gebruikersnaam',
    'admin_users_nickname'              => 'Nicknaam',
    'admin_users_last_seen'             => 'Laatst gezien',
    'admin_users_seen_never'            => 'Nooit',
    'admin_users_seen_now'              => 'Nu',
    'admin_users_user_deleted'          => 'Gebruiker %s succesvol verwijderd',
    'admin_users_confirm_delete'        => 'Weet je zeker dat je deze gebruiker wilt verwijderen?',
    'admin_users_action'                => 'Acties',
    'admin_users_end_admins'            => '%d administrators',
    'admin_users_end_users'             => '%d Normale gebruikers',

    /* Page: admin->userlist->edit          */
    'admin_users_edit_title'            => 'Verander opties voor <b>%s</b>',
    'admin_users_edit_access'           => 'Toegang',
    'admin_users_rank_admin'            => 'Administrator',
    'admin_users_rank_user'             => 'Gebruiker',
    'admin_users_edit_realname'         => 'Realname',
    'admin_users_edit_nickname'         => 'Nickname',
    'admin_users_edit_password'         => 'Wachtwoord',
    'admin_users_edit_server'           => 'Server',
    'admin_users_edit_port'             => 'Poort',
    'admin_users_edit_serverpass'       => 'Server wachtwoord',
    'admin_users_edit_awaynick'         => 'Afwezigheids nick',
    'admin_users_edit_awaymessage'      => 'Afwezigheids melding',
    'admin_users_edit_quitasaway'       => 'Gebruik quit als Afwezigheid',
    'admin_users_edit_vhost'            => 'Vhost',
    'admin_users_edit_vhost_custom'     => '...of kies je eigen vhost',
    'admin_users_edit_jump'             => 'Jump',
    'admin_users_edit_invaliduser'      => 'Gebruiker \'%s\' is niet juist',
    'admin_users_edit_reconnecting'     => 'Reconnecting bouncer \'%s\'...',

    /* Page: admin->adduser                 */
    'admin_adduser_username'            => 'Gebruikersnaam',
    'admin_adduser_password'            => 'Wachtwoord',
    'admin_adduser_ifPwEmpty'           => 'Als je hier geen wachtwoord invoert, krijg je een random wachtwoord.',
    'admin_adduser_submit'              => 'Gebruiker toevoegen',
    'admin_adduser_user_added'          => 'Gebruiker %s toegevoegd, met wachtwoord: %s',

    /* Page: admin->trustedips              */
    'admin_trustedips_ip'               => 'IP-adres',
    'admin_trustedips_action'           => 'Acties',
    'admin_trustedips_added'            => 'Vertrouwde IP-adres toegevoegd',
    'admin_trustedips_removed'          => 'Vertrouwde IP-adres verwijderd',
    'admin_trustedips_already'          => 'Vertrouwde IP-adres bestaat al',
    'admin_trustedips_ip_invalid'       => 'Het ingevoerde IP-adres is niet juist',

    /* Page: admin->vhosts                  */
    'admin_vhosts_ip'                   => 'IP-adres',
    'admin_vhosts_userlimit'            => 'Gebruiker limiet',
    'admin_vhosts_host'                 => 'Host',
    'admin_vhosts_users'                => 'Gebruikers',
    'admin_vhosts_action'               => 'Acties',
    'admin_vhosts_ip_invalid'           => 'Het ingevoerde ip adres is niet juist',
    'admin_vhosts_added'                => 'Nieuwe vhost is successvol toegevoegd',
    'admin_vhosts_removed'              => 'Vhost is successvol verwijderd',
    'admin_vhosts_numerical'            => 'Ingevoerde limiet is geen getal',

    /* Page: admin->globalmsg               */
    'admin_globalmsg_message'           => 'Melding',
    'admin_globalmsg_submit'            => 'Verzenden',
    'admin_globalmsg_ok'                => 'Melding succesvol verzonden',

    /* Page: admin->mainlog                 */
    'admin_mainlog_empty'               => 'Log is leeg',
    'admin_mainlog_erase'               => 'Verwijder log',
    'admin_mainlog_erased'              => 'Log successvol verwijderd',

    /* Misc stuff                           */
    'misc_trustedips_auto_add'          => 'Webserver IP-adres (%s) is automatisch toegevoegd aan vertrouwde IP-adressen',
    'misc_save_changes'                 => 'Veranderingen opslaan',
    'misc_save_ok'                      => 'Veranderingen opgeslagen.',
    'misc_yes'                          => 'Ja',
    'misc_no'                           => 'Nee',
    'misc_on'                           => 'Aan',
    'misc_off'                          => 'Uit',

    'misc_days'                         => 'dagen',
    'misc_hours'                        => 'Uren',
    'misc_minutes'                      => 'minuten',
    'misc_seconds'                      => 'seconden',

    'misc_403'                          =>  'Je hebt geen toegang tot deze pagina',
    'misc_404'                          =>  'Pagina \'%s\' niet gevonden',
);
?>

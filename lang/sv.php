<?php
/*
 * Copyright (C) 2010-2012 Conny Sjöblom <biohzn@mustis.org>
 * Copyright (C) 2010-2012 Arne Jensen   <darkdevil@darkdevil.dk>
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
 * Swedish language file.
*/
?>
<?php
$lang = array(

    /* Navigation                           */
    'nav_status'                    => 'Status',

    'nav_user'                      => 'Användare',
    'nav_user_settings'             => 'Inställningar',
    'nav_user_server'               => 'Server',
    'nav_user_authsettings'         => 'Användaruppgifter',
    'nav_user_away'                 => 'Borta',
    'nav_user_channels'             => 'Kanaler',
    'nav_user_log'                  => 'Logg',

    'nav_vadmin'                    => 'vAdmin',
    'nav_vadmin_users'              => 'Användare',
    'nav_vadmin_adduser'            => 'Lägg till användare',

    'nav_admin'                     => 'Administratör',
    'nav_admin_users'               => 'Användare',
    'nav_admin_adduser'             => 'Lägg till användare',
    'nav_admin_trustedips'          => 'Tillåtna IPn',
    'nav_admin_vhosts'              => 'Vhosts',
    'nav_admin_globalmsg'           => 'Globala meddelanden',
    'nav_admin_mainlog'             => 'Huvudlogg',

    'nav_logout'                    => 'Logga ut',

    'login_username'                => 'Användarnamn',
    'login_password'                => 'Lösenord',
    'login_server'                  => 'Server',
    'login_submit'                  => 'Logga in',
    'login_wrong_password'          => 'Fel användarnamn och/eller lösenord',

    /* Page: status                         */
    'status_uptime'                 => 'Upptid',
    'status_nickname'               => 'Alias',
    'status_disconnected'           => 'Nerkopplad',
    'status_awaynick'               => 'Nick (borta)',
    'status_awaymessage'            => 'Meddelande (borta)',
    'status_realname'               => 'Namn',
    'status_server'                 => 'Server',
    'status_traffic'                => 'Trafik',

    /* Page: user->settings                 */
    'user_settings_realname'        => 'Namn',
    'user_settings_nickname'        => 'Alias',
    'user_settings_password'        => 'Lösenord',
    'user_settings_sysnotices'      => 'System meddelanden',

    /* Page: user->server                   */
    'user_server_server'            => 'Server',
    'user_server_port'              => 'Port',
    'user_server_password'          => 'Lösenord',
    'user_server_vhost'             => 'Vhost',
    'user_server_vhost_custom'      => '...eller definera din egen vhost',
    'user_server_jump'              => 'Återanslut',
    'user_server_reconnecting'      => 'Återansluter bouncer...',

    /* Page: user->auth                     */
    'user_auth_username'            => 'Användarnamn',
    'user_auth_password'            => 'Lösenord',
    'user_auth_auto'                => 'Automatisk inlogging',

    /* Page: user->away                     */
    'user_away_awaynick'            => 'Nick (borta)',
    'user_away_awaymessage'         => 'Meddelande (borta)',
    'user_away_usequitasaway'       => 'Använd avslutsmeddelande som meddelande borta',

    /* Page: user->channels                 */
    'user_channels_join_chan'       => 'Gå in i kanal',
    'user_channels_channel'         => 'Kanal',
    'user_channels_modes'           => 'Lägen',
    'user_channels_action'          => 'Åtgärder',
    'user_channels_join'            => 'Gå in i',
    'user_channels_part'            => 'Lämna',
    'user_channels_join_ok'         => 'Gick in i %s',
    'user_channels_part_ok'         => 'Lämnade %s',
    'user_channels_not_connected'   => 'Du är inte ansluten till IRC.',
    'user_channels_already_20chans' => 'Du är redan i 20 kanaler.',

    /* Page: user->log                      */
    'user_log_empty'                => 'Loggen tom',
    'user_log_erase'                => 'Töm loggen',
    'user_log_erased'               => 'Loggen tömd',

    /* Page: admin->userlist                */
    'admin_users_title_admins'      => 'Administratörer',
    'admin_users_title_users'       => 'Användare',
    'admin_users_username'          => 'Användarnamn',
    'admin_users_nickname'          => 'Alias',
    'admin_users_last_seen'         => 'Sågs senast',
    'admin_users_seen_never'        => 'Aldrig',
    'admin_users_seen_now'          => 'Nu',
    'admin_users_user_deleted'      => 'Användaren %s togs bort',
    'admin_users_confirm_delete'    => 'Vill du verkligen tabort användaren?',
    'admin_users_action'            => 'Åtgärder',
    'admin_users_end_admins'        => '%d administratörer',
    'admin_users_end_users'         => '%d vanliga användare',

    /* Page: admin->userlist->edit          */
    'admin_users_edit_title'        => 'Ändrar instälningar <b>%s</b>',
    'admin_users_edit_access'       => 'Rättigheter',
    'admin_users_rank_admin'        => 'Administratör',
    'admin_users_rank_user'         => 'Användare',
    'admin_users_edit_realname'     => 'Namn',
    'admin_users_edit_nickname'     => 'Alias',
    'admin_users_edit_password'     => 'Lösenord',
    'admin_users_edit_server'       => 'Server',
    'admin_users_edit_port'         => 'Port',
    'admin_users_edit_serverpass'   => 'Server lösenord',
    'admin_users_edit_awaynick'     => 'Nick (borta)',
    'admin_users_edit_awaymessage'  => 'Meddelande (borta)',
    'admin_users_edit_quitasaway'   => 'Använd avslutsmeddelande som meddelande borta',
    'admin_users_edit_vhost'        => 'Vhost',
    'admin_users_edit_vhost_custom' => '...eller definera din egen vhost',
    'admin_users_edit_jump'         => 'Återanslut',
    'admin_users_edit_invaliduser'  => 'Användaren \'%s\' finns inte',
    'admin_users_edit_reconnecting' => 'Återansluter \'%s\'...',

    /* Page: admin->adduser                 */
    'admin_adduser_username'        => 'Användarnamn',
    'admin_adduser_password'        => 'Lösenord',
    'admin_adduser_ifPwEmpty'       => 'NOTERA. Om lösenordsfältet är tom, genereras ett slumpmässigt lösenord.',
    'admin_adduser_submit'          => 'Lägg till användare',
    'admin_adduser_user_added'      => 'Användare %s tillagd, med lösenord: %s',

    /* Page: admin->trustedips              */
    'admin_trustedips_ip'           => 'IP',
    'admin_trustedips_action'       => 'Åtgärder',
    'admin_trustedips_added'        => 'Tillåtet IP tillagt',
    'admin_trustedips_removed'      => 'Tillåtet IP borttaget',
    'admin_trustedips_already'      => 'IPt är redan tillåtet',
    'admin_trustedips_ip_invalid'   => 'IP-adressen är inte giltig',

    /* Page: admin->vhosts                  */
    'admin_vhosts_ip'               => 'IP',
    'admin_vhosts_userlimit'        => 'Användargräns',
    'admin_vhosts_host'             => 'vHost',
    'admin_vhosts_users'            => 'Användare',
    'admin_vhosts_action'           => 'Åtgärder',
    'admin_vhosts_ip_invalid'       => 'IP-adressen är inte giltig',
    'admin_vhosts_added'            => 'Ny vhost tillagd',
    'admin_vhosts_removed'          => 'Vhost borttagen',
    'admin_vhosts_numerical'        => 'Gränsen är inte en siffra',

    /* Page: admin->globalmsg               */
    'admin_globalmsg_message'       => 'Meddelande',
    'admin_globalmsg_submit'        => 'Skicka',
    'admin_globalmsg_ok'            => 'Meddelande skickat.',

    /* Page: admin->mainlog                 */
    'admin_mainlog_empty'           => 'Loggen tom',
    'admin_mainlog_erase'           => 'Töm logg',
    'admin_mainlog_erased'          => 'Loggen tömd.',

    /* Misc stuff                           */
    'misc_trustedips_auto_add'      => 'Automatiskt tillät webservern\'s IP (%s) ',
    'misc_save_changes'             => 'Spara inställningar',
    'misc_save_ok'                  => 'Inställningar sparade',
    'misc_yes'                      => 'Ja',
    'misc_no'                       => 'Nej',
    'misc_on'                       => 'På',
    'misc_off'                      => 'Av',

    'misc_days'                     => 'dagar',
    'misc_hours'                    => 'timmar',
    'misc_minutes'                  => 'minuter',
    'misc_seconds'                  => 'sekunder',

    'misc_403'                      =>  'Du har inte tillgång till denna sida',
    'misc_404'                      =>  'Sidan \'%s\' hittades inte',
);
?>

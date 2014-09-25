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
    'nav_status'                    => 'Tila',

    'nav_user'                      => 'Käyttäjä',
    'nav_user_settings'             => 'Asetukset',
    'nav_user_server'               => 'Palvelin',
    'nav_user_authsettings'         => 'Auth-asetukset',
    'nav_user_away'                 => 'Poissa',
    'nav_user_channels'             => 'Kanavat',
    'nav_user_log'                  => 'Loki',

    'nav_admin'                     => 'Pääkäyttäjä',
    'nav_admin_users'               => 'Käyttäjät',
    'nav_admin_adduser'             => 'Lisää käyttäjä',
    'nav_admin_trustedips'          => 'Luotetut IP-osoitteet',
    'nav_admin_vhosts'              => 'Vhostit',
    'nav_admin_globalmsg'           => 'Globaali viesti',
    'nav_admin_mainlog'             => 'Pääloki',

    'nav_logout'                    => 'Kirjaudu ulos',

    'login_username'                => 'Käyttäjätunnus',
    'login_password'                => 'Salasana',
    'login_server'                  => 'Palvelin',
    'login_submit'                  => 'Kirjaudu sisään',
    'login_wrong_password'          => 'Väärä käyttäjätunnus tai salasana',

    /* Page: status                         */
    'status_uptime'                 => 'Käynnissäoloaika',
    'status_nickname'               => 'Nimimerkki',
    'status_disconnected'           => 'Ei yhdistetty',
    'status_awaynick'               => 'Poissaolonimimerkki',
    'status_awaymessage'            => 'Poissaoloviesti',
    'status_realname'               => 'Koko nimi',
    'status_server'                 => 'Palvelin',
    'status_traffic'                => 'Liikenne',

    /* Page: user->settings                 */
    'user_settings_realname'        => 'Koko nimi',
    'user_settings_nickname'        => 'Nimimerkki',
    'user_settings_password'        => 'Salasana',
    'user_settings_sysnotices'      => 'Järjestelmäviestit',

    /* Page: user->server                   */
    'user_server_server'            => 'Palvelin',
    'user_server_port'              => 'Portti',
    'user_server_password'          => 'Salasana',
    'user_server_vhost'             => 'Vhosti',
    'user_server_vhost_custom'      => '...tai määrittele vhostin itse',
    'user_server_jump'              => 'Hyppää',
    'user_server_reconnecting'      => 'Yhdistetään bounceria...',

    /* Page: user->auth                     */
    'user_auth_username'            => 'Käyttäjätunnus',
    'user_auth_password'            => 'Salasana',
    'user_auth_auto'                => 'Auto-auth',

    /* Page: user->away                     */
    'user_away_awaynick'            => 'Poissaolonimimerkki',
    'user_away_awaymessage'         => 'Poissaoloviesti',
    'user_away_usequitasaway'       => 'Käytä lopetusta poissaolona',

    /* Page: user->channels                 */
    'user_channels_join_chan'       => 'Liity kanavalle',
    'user_channels_channel'         => 'Kanava',
    'user_channels_modes'           => 'Moodi',
    'user_channels_action'          => 'Toiminnot',
    'user_channels_join'            => 'Liity',
    'user_channels_part'            => 'Poistu',
    'user_channels_join_ok'         => 'Liityit onnistuneesti kanavalle %s',
    'user_channels_part_ok'         => 'Poistuit onnistuneesti kanavalta %s',
    'user_channels_not_connected'   => 'Et ole yhdistettynä IRC:iin.',
    'user_channels_already_20chans' => 'Olet jo liittynyt 20:lle kanavalle.',

    /* Page: user->log                      */
    'user_log_empty'                => 'Loki tyhjä',
    'user_log_erase'                => 'Tyhjennä loki',
    'user_log_erased'               => 'Loki tyhjennetty onnistuneesti',

    /* Page: admin->userlist                */
    'admin_users_title_admins'      => 'Pääkäyttäjät',
    'admin_users_title_users'       => 'Käyttäjät',
    'admin_users_username'          => 'Käyttäjätunnus',
    'admin_users_nickname'          => 'Nimimerkki',
    'admin_users_last_seen'         => 'Viimeksi nähty',
    'admin_users_seen_never'        => 'Ei koskaan',
    'admin_users_seen_now'          => 'Nyt',
    'admin_users_user_deleted'      => 'Käyttäjä %s onnistuneesti poistettu',
    'admin_users_confirm_delete'    => 'Haluatko varmasti poistaa tämän käyttäjän?',
    'admin_users_action'            => 'Toiminnot',
    'admin_users_end_admins'        => '%d pääkäyttäjää',
    'admin_users_end_users'         => '%d käyttäjää',

    /* Page: admin->userlist->edit          */
    'admin_users_edit_title'        => 'Muutetan asetuksia käyttäjälle <b>%s</b>',
    'admin_users_edit_access'       => 'Oikeudet',
    'admin_users_rank_admin'        => 'Pääkäyttäjä',
    'admin_users_rank_user'         => 'Käyttäjätunnus',
    'admin_users_edit_realname'     => 'Koko nimi',
    'admin_users_edit_nickname'     => 'Nimimerkki',
    'admin_users_edit_password'     => 'Salasana',
    'admin_users_edit_server'       => 'Palvelin',
    'admin_users_edit_port'         => 'Portti',
    'admin_users_edit_serverpass'   => 'Palvelimen salasana',
    'admin_users_edit_awaynick'     => 'Poissaolonimimerkki',
    'admin_users_edit_awaymessage'  => 'Poissaoloviesti',
    'admin_users_edit_quitasaway'   => 'Käytä lopetusta poissaolona',
    'admin_users_edit_vhost'        => 'Vhosti',
    'admin_users_edit_vhost_custom' => '...tai määrittele vhostin itse',
    'admin_users_edit_jump'         => 'Hyppää',
    'admin_users_edit_invaliduser'  => 'Käyttäjä \'%s\' ei ole kelvollinen',
    'admin_users_edit_reconnecting' => 'Uudelleenyhdistetään bounceri \'%s\'...',

    /* Page: admin->adduser                 */
    'admin_adduser_username'        => 'Käyttäjätunnus',
    'admin_adduser_password'        => 'Salasana',
    'admin_adduser_ifPwEmpty'       => 'HUOM. Jos salasanakentän jättää tyhjäksi, salasana generoidaan automaattisesti.',
    'admin_adduser_submit'          => 'Lisätään käyttäjää',
    'admin_adduser_user_added'      => 'Käyttäjä %s lisätty, salasanalla: %s',

    /* Page: admin->trustedips              */
    'admin_trustedips_ip'           => 'IP-osoite',
    'admin_trustedips_action'       => 'Toiminnot',
    'admin_trustedips_added'        => 'Luotettu IP-osoite lisätty',
    'admin_trustedips_removed'      => 'Luotettu IP-osoite poistettu',
    'admin_trustedips_already'      => 'Luotettu IP-osoite on jo lisätty',
    'admin_trustedips_ip_invalid'   => 'Lisäämäsi IP-osoite ei ole kelvollinen',

    /* Page: admin->vhosts                  */
    'admin_vhosts_ip'               => 'IP-osoite',
    'admin_vhosts_userlimit'        => 'Käyttäjäraja',
    'admin_vhosts_host'             => 'Isäntä',
    'admin_vhosts_users'            => 'Käyttäjät',
    'admin_vhosts_action'           => 'Toiminnot',
    'admin_vhosts_ip_invalid'       => 'Lisäämäsi IP-osoite ei ole pätevä',
    'admin_vhosts_added'            => 'Uusi vhosti lisätty onnistuneesti',
    'admin_vhosts_removed'          => 'Vhosti poistettu onnistuneesti',
    'admin_vhosts_numerical'        => 'Antamasi raja ei ole numeerinen',

    /* Page: admin->globalmsg               */
    'admin_globalmsg_message'       => 'Viesti',
    'admin_globalmsg_submit'        => 'Lähetä',
    'admin_globalmsg_ok'            => 'Viesti lähetettiin onnistuneesti',

    /* Page: admin->mainlog                 */
    'admin_mainlog_empty'           => 'Loki tyhjä',
    'admin_mainlog_erase'           => 'Tyhjennä loki',
    'admin_mainlog_erased'          => 'Loki tyhjennettiin onnistuneesti',

    /* Misc stuff                           */
    'misc_trustedips_auto_add'      => 'Webpalvelimen IP-osoite (%s) lisätty automaattisesti luotettuihin IP-osoitteisiin',
    'misc_save_changes'             => 'Tallenna muutokset',
    'misc_save_ok'                  => 'Muutokset tallennettu.',
    'misc_yes'                      => 'Kyllä',
    'misc_no'                       => 'Ei',
    'misc_on'                       => 'Päällä',
    'misc_off'                      => 'Pois päältä',

    'misc_days'                     => 'päivää',
    'misc_hours'                    => 'tuntia',
    'misc_minutes'                  => 'minuuttia',
    'misc_seconds'                  => 'sekuntia',

    'misc_403'                      =>  'Sinulla ei ole riittäviä oikeuksia nähdä sivua',
    'misc_404'                      =>  'Sivua \'%s\' ei löytynyt',
);
?>

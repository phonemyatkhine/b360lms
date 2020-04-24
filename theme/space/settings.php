<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package   theme_space
 * @copyright 2018 - 2020 Marcin Czaja - Rosea Themes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_space_admin_settingspage_tabs('themesettingspace', get_string('configtitle', 'theme_space'));
          $page = new admin_settingpage('theme_space_general', get_string('generalsettings', 'theme_space'));

            //HR
            $name = 'theme_space/hintro';
            $heading = get_string('hintro', 'theme_space');
            $setting = new admin_setting_heading($name, $heading, format_text(get_string('hintrodesc', 'theme_space'), FORMAT_MARKDOWN));
            $page->add($setting);

            // Show/hide author info
            $name = 'theme_space/showauthorinfo';
            $title = get_string('showauthorinfo', 'theme_space');
            $description = get_string('showauthorinfodesc', 'theme_space');
            $default = 1;
            $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
            $page->add($setting);

            // Favicon setting.
            $name = 'theme_space/favicon';
            $title = get_string('favicon', 'theme_space');
            $description = get_string('favicondesc', 'theme_space');
            $opts = array('accepted_types' => array('.ico'), 'maxfiles' => 1);
            $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, $opts);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            // Preset.
            $name = 'theme_space/preset';
            $title = get_string('preset', 'theme_space');
            $description = get_string('preset_desc', 'theme_space');
            $default = 'default.scss';

            $context = context_system::instance();
            $fs = get_file_storage();
            $files = $fs->get_area_files($context->id, 'theme_space', 'preset', 0, 'itemid, filepath, filename', false);

            $choices = [];
            foreach ($files as $file) {
            $choices[$file->get_filename()] = $file->get_filename();
            }
            // These are the built in presets.
            $choices['default.scss'] = 'default.scss';

            $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            // Preset files setting.
            $name = 'theme_space/presetfiles';
            $title = get_string('presetfiles','theme_space');
            $description = get_string('presetfiles_desc', 'theme_space');

            $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
            array('maxfiles' => 20, 'accepted_types' => array('.scss')));
            $page->add($setting);

            // Variable $body-color.
            // Heading
            $name = 'theme_space/HVariable';
            $heading = get_string('HVariable', 'theme_space');
            $setting = new admin_setting_heading($name, $heading, format_text(get_string('HVariabledesc', 'theme_space'), FORMAT_MARKDOWN));
            $page->add($setting);

            // Variable $body-color.
            // We use an empty default value because the default color should come from the preset.
            $name = 'theme_space/brandcolorlvl1';
            $title = get_string('brandcolorlvl1', 'theme_space');
            $description = get_string('brandcolorlvl1_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $name = 'theme_space/brandcolorlvl2';
            $title = get_string('brandcolorlvl2', 'theme_space');
            $description = get_string('brandcolorlvl2_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $name = 'theme_space/brandcolorlvl3';
            $title = get_string('brandcolorlvl3', 'theme_space');
            $description = get_string('brandcolorlvl3_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $name = 'theme_space/brandcolorlvl4';
            $title = get_string('brandcolorlvl4', 'theme_space');
            $description = get_string('brandcolorlvl4_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $name = 'theme_space/brandcolorlvl5';
            $title = get_string('brandcolorlvl5', 'theme_space');
            $description = get_string('brandcolorlvl5_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $name = 'theme_space/brandcolorlvl6';
            $title = get_string('brandcolorlvl6', 'theme_space');
            $description = get_string('brandcolorlvl6_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $name = 'theme_space/redcolor';
            $title = get_string('redcolor', 'theme_space');
            $description = get_string('redcolor_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $name = 'theme_space/orangecolor';
            $title = get_string('orangecolor', 'theme_space');
            $description = get_string('orangecolor_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $name = 'theme_space/yellowcolor';
            $title = get_string('yellowcolor', 'theme_space');
            $description = get_string('yellowcolor_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $name = 'theme_space/greencolor';
            $title = get_string('greencolor', 'theme_space');
            $description = get_string('greencolor_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $name = 'theme_space/purplecolor';
            $title = get_string('purplecolor', 'theme_space');
            $description = get_string('purplecolor_desc', 'theme_space');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

    $settings->add($page);

    /***
    *
    *    Block Order settings
    *
    ***/
    $page = new admin_settingpage('theme_space_blockorder', get_string('blockordersettings', 'theme_space'));

        //HR
        $name = 'theme_space/HR23';
        $heading = get_string('HR23', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR23desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);

        $name = 'theme_space/slotblock9';
        $title = get_string('slotblock9', 'theme_space');
        $description = get_string('slotblock9desc', 'theme_space');
        $choices = array(
          "1" => "1",
          "2" => "2",
          "3" => "3",
          "4" => "4",
          "5" => "5",
          "6" => "6",
          "7" => "7",
          "8" => "8",
          "9" => "9"                    
        );        
        $setting = new admin_setting_configselect($name, $title, $description, '1', $choices);
        $page->add($setting);  

        $name = 'theme_space/slotblock1';
        $title = get_string('slotblock1', 'theme_space');
        $description = get_string('slotblock1desc', 'theme_space');
        $choices = array(
          "1" => "1",
          "2" => "2",
          "3" => "3",
          "4" => "4",
          "5" => "5",
          "6" => "6",
          "7" => "7",
          "8" => "8",
          "9" => "9"                    
        );        
        $setting = new admin_setting_configselect($name, $title, $description, '3', $choices);
        $page->add($setting);

        // Show/hide HR
        $name = 'theme_space/showfpblock1hr';
        $title = get_string('showfpblock1hr', 'theme_space');
        $description = get_string('showfpblock1hrdesc', 'theme_space');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $page->add($setting);

        $name = 'theme_space/slotblock2';
        $title = get_string('slotblock2', 'theme_space');
        $description = get_string('slotblock2desc', 'theme_space');
        $choices = array(
          "1" => "1",
          "2" => "2",
          "3" => "3",
          "4" => "4",
          "5" => "5",
          "6" => "6",
          "7" => "7",
          "8" => "8",
          "9" => "9"                    
        );        
        $setting = new admin_setting_configselect($name, $title, $description, '4', $choices);
        $page->add($setting);

        // Show/hide HR
        $name = 'theme_space/showfpblock2hr';
        $title = get_string('showfpblock2hr', 'theme_space');
        $description = get_string('showfpblock2hrdesc', 'theme_space');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $page->add($setting);

        $name = 'theme_space/slotblock3';
        $title = get_string('slotblock3', 'theme_space');
        $description = get_string('slotblock3desc', 'theme_space');
        $choices = array(
          "1" => "1",
          "2" => "2",
          "3" => "3",
          "4" => "4",
          "5" => "5",
          "6" => "6",
          "7" => "7",
          "8" => "8",
          "9" => "9"                    
        );        
        $setting = new admin_setting_configselect($name, $title, $description, '8', $choices);
        $page->add($setting);

        $name = 'theme_space/slotblock4';
        $title = get_string('slotblock4', 'theme_space');
        $description = get_string('slotblock4desc', 'theme_space');
        $choices = array(
          "1" => "1",
          "2" => "2",
          "3" => "3",
          "4" => "4",
          "5" => "5",
          "6" => "6",
          "7" => "7",
          "8" => "8",
          "9" => "9"                    
        );        
        $setting = new admin_setting_configselect($name, $title, $description, '5', $choices);
        $page->add($setting);

        // Show/hide HR
        $name = 'theme_space/showfpblock4hr';
        $title = get_string('showfpblock4hr', 'theme_space');
        $description = get_string('showfpblock4hrdesc', 'theme_space');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $page->add($setting);        

        $name = 'theme_space/slotblock6';
        $title = get_string('slotblock6', 'theme_space');
        $description = get_string('slotblock6desc', 'theme_space');
        $choices = array(
          "1" => "1",
          "2" => "2",
          "3" => "3",
          "4" => "4",
          "5" => "5",
          "6" => "6",
          "7" => "7",
          "8" => "8",
          "9" => "9"                    
        );        
        $setting = new admin_setting_configselect($name, $title, $description, '2', $choices);
        $page->add($setting);       

        // Show/hide HR
        $name = 'theme_space/showfpblock6hr';
        $title = get_string('showfpblock6hr', 'theme_space');
        $description = get_string('showfpblock6hrdesc', 'theme_space');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $page->add($setting);     

        $name = 'theme_space/slotblock7';
        $title = get_string('slotblock7', 'theme_space');
        $description = get_string('slotblock7desc', 'theme_space');
        $choices = array(
          "1" => "1",
          "2" => "2",
          "3" => "3",
          "4" => "4",
          "5" => "5",
          "6" => "6",
          "7" => "7",
          "8" => "8",
          "9" => "9"                    
        );        
        $setting = new admin_setting_configselect($name, $title, $description, '9', $choices);
        $page->add($setting);

        // Show/hide HR
        $name = 'theme_space/showfpblock7hr';
        $title = get_string('showfpblock7hr', 'theme_space');
        $description = get_string('showfpblock7hrdesc', 'theme_space');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $page->add($setting);

        $name = 'theme_space/slotblock5';
        $title = get_string('slotblock5', 'theme_space');
        $description = get_string('slotblock5desc', 'theme_space');
        $choices = array(
          "1" => "1",
          "2" => "2",
          "3" => "3",
          "4" => "4",
          "5" => "5",
          "6" => "6",
          "7" => "7",
          "8" => "8",
          "9" => "9"                    
        );        
        $setting = new admin_setting_configselect($name, $title, $description, '5', $choices);
        $page->add($setting);
        
        $name = 'theme_space/slotblock8';
        $title = get_string('slotblock8', 'theme_space');
        $description = get_string('slotblock8desc', 'theme_space');
        $choices = array(
          "1" => "1",
          "2" => "2",
          "3" => "3",
          "4" => "4",
          "5" => "5",
          "6" => "6",
          "7" => "7",
          "8" => "8",
          "9" => "9"                    
        );        
        $setting = new admin_setting_configselect($name, $title, $description, '5', $choices);
        $page->add($setting); 

        // Show/hide HR
        $name = 'theme_space/showfpblock8hr';
        $title = get_string('showfpblock8hr', 'theme_space');
        $description = get_string('showfpblock8hrdesc', 'theme_space');
        $default = 1;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $page->add($setting);    
        
    $settings->add($page);

    /***
    *
    *    Login page settings
    *
    ***/
    $page = new admin_settingpage('theme_space_loginpage', get_string('loginpagesettings', 'theme_space'));


				$name = 'theme_space/loginalignment';
				$title = get_string('loginalignment', 'theme_space');
				$description = get_string('loginalignmentdesc', 'theme_space');
				$options = [];
				$options[1] = get_string('loginalignment-left', 'theme_space');
				$options[2] = get_string('loginalignment-center', 'theme_space');
				$options[3] = get_string('loginalignment-right', 'theme_space');
				$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
				$setting->set_updatedcallback('theme_reset_all_caches');
				$page->add($setting);

				$name = 'theme_space/showlbg';
				$title = get_string('showlbg', 'theme_space');
				$description = get_string('showlbgDesc', 'theme_space');
				$default = 0;
				$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
				$page->add($setting);

				$name = 'theme_space/loginbg';
				$title = get_string('loginbg', 'theme_space');
				$description = get_string('loginbgDesc', 'theme_space');
				$opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
				$setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbg', 0, $opts);
				$setting->set_updatedcallback('theme_reset_all_caches');
				$page->add($setting);


	  $settings->add($page);




    /***
    *
    *    Front page settings
    *
    ***/
    $page = new admin_settingpage('theme_space_frontpage', get_string('frontpagesettings', 'theme_space'));

          /***
          *
          *   Hero
          *
          ***/

          // Show/hide logo
          $name = 'theme_space/showherologo';
          $title = get_string('showherologo', 'theme_space');
          $description = get_string('showherologodesc', 'theme_space');
          $default = 1;
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);   

          $name = 'theme_space/herofwenabled';
          $title = get_string('herofwenabled', 'theme_space');
          $description = get_string('herofwenableddesc', 'theme_space');
          $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
          $page->add($setting);

          $name = 'theme_space/heroimg';
          $title = get_string('heroimg', 'theme_space');
          $description = get_string('heroimgdesc', 'theme_space');
          $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
          $setting = new admin_setting_configstoredfile($name, $title, $description, 'heroimg', 0, $opts);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/HeroHeading';
          $title = get_string('HeroHeading', 'theme_space');
          $description = get_string('HeroHeadingDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/HeroText';
          $title = get_string('HeroText', 'theme_space');
          $description = get_string('HeroTextDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/HeroText2';
          $title = get_string('HeroText2', 'theme_space');
          $description = get_string('HeroText2Desc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/HeroLabel';
          $title = get_string('HeroLabel', 'theme_space');
          $description = get_string('HeroLabelDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/HeroURL';
          $title = get_string('HeroURL', 'theme_space');
          $description = get_string('HeroURLDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/HeroLabel2';
          $title = get_string('HeroLabel2', 'theme_space');
          $description = get_string('HeroLabel2Desc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/HeroURL2';
          $title = get_string('HeroURL2', 'theme_space');
          $description = get_string('HeroURL2Desc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

    $settings->add($page);


    $page = new admin_settingpage('theme_space_siemaSlider', get_string('siemaSlidersettings', 'theme_space'));

              // Enable or disable Slideshow settings.
              $name = 'theme_space/sliderenabled';
              $title = get_string('sliderenabled', 'theme_space');
              $description = get_string('sliderenableddesc', 'theme_space');
              $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
              $page->add($setting);

              $name = 'theme_space/sliderfwenabled';
              $title = get_string('sliderfwenabled', 'theme_space');
              $description = get_string('sliderfwenableddesc', 'theme_space');
              $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
              $page->add($setting);

              $name = 'theme_space/sliderintervalenabled';
              $title = get_string('sliderintervalenabled', 'theme_space');
              $description = get_string('sliderintervalenableddesc', 'theme_space');
              $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
              $page->add($setting);

              $name = 'theme_space/sliderinterval';
          		$title = get_string('sliderinterval', 'theme_space');
          		$description = get_string('sliderintervalDesc', 'theme_space');
          		$default = '6000';
          		$setting = new admin_setting_configtext($name, $title, $description, $default);
          		$setting->set_updatedcallback('theme_reset_all_caches');
          		$page->add($setting);

              $name = 'theme_space/slidercount';
              $title = get_string('slidercount', 'theme_space');
              $description = get_string('slidercountdesc', 'theme_space');
              $default = 1;
              $options = array();
              for ($i = 1; $i < 11; $i++) {
                  $options[$i] = $i;
              }
              $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
              $setting->set_updatedcallback('theme_reset_all_caches');
              $page->add($setting);

              // If we don't have an slide yet, default to the preset.
              $slidercount = get_config('theme_space', 'slidercount');

              //HR
              $name = 'theme_space/HR11';
              $heading = get_string('HR11', 'theme_space');
              $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR11desc', 'theme_space'), FORMAT_MARKDOWN));
              $page->add($setting);


              if (!$slidercount) {
                  $slidercount = 1;
              }

              for ($sliderindex = 1; $sliderindex <= $slidercount; $sliderindex++) {
                  $fileid = 'sliderimage' . $sliderindex;
                  $name = 'theme_space/sliderimage' . $sliderindex;
                  $title = get_string('sliderimage', 'theme_space');
                  $description = get_string('sliderimagedesc', 'theme_space');
                  $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
                  $setting = new admin_setting_configstoredfile($name, $sliderindex . $title, $description, $fileid, 0, $opts);
                  $setting->set_updatedcallback('theme_reset_all_caches');
                  $page->add($setting);

                  $name = 'theme_space/slidertitle' . $sliderindex;
                  $title = get_string('slidertitle', 'theme_space');
                  $description = get_string('slidertitledesc', 'theme_space');
                  $setting = new admin_setting_configtext($name, $sliderindex . $title, $description, $default);
                  $page->add($setting);

                  $name = 'theme_space/slidersubtitle' . $sliderindex;
                  $title = get_string('slidersubtitle', 'theme_space');
                  $description = get_string('slidersubtitledesc', 'theme_space');
                  $setting = new admin_setting_configtext($name, $sliderindex . $title, $description, $default);
                  $page->add($setting);

                  $name = 'theme_space/slidercap' . $sliderindex;
                  $title = get_string('slidercaption', 'theme_space');
                  $description = get_string('slidercaptiondesc', 'theme_space');
                  $default = '';
                  $setting = new admin_setting_configtextarea($name, $sliderindex . $title, $description, $default);
                  $page->add($setting);
              }

    $settings->add($page);



    /***
    *
    *    Block #1
    *
    ***/
    $page = new admin_settingpage('theme_space_block1', get_string('block1settings', 'theme_space'));

        //HR
        $name = 'theme_space/HR1';
        $heading = get_string('HR1', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR1desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);

        /***
        *
        *   HTML Block 1
        *
        ***/

        $name = 'theme_space/FPHTMLBlock1';
        $title = get_string('FPHTMLBlock1', 'theme_space');
        $description = get_string('FPHTMLBlock1Desc', 'theme_space');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $page->add($setting);

        $name = 'theme_space/ShowFPBlock1Intro';
        $title = get_string('ShowFPBlock1Intro', 'theme_space');
        $description = get_string('ShowFPBlock1IntroDesc', 'theme_space');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $page->add($setting);
  
        $name = 'theme_space/FPBlock1Title';
        $title = get_string('FPBlock1Title', 'theme_space');
        $description = get_string('FPBlock1TitleDesc', 'theme_space');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $page->add($setting);
  
        $name = 'theme_space/FPBlock1Content';
        $title = get_string('FPBlock1Content', 'theme_space');
        $description = get_string('FPBlock1ContentDesc', 'theme_space');
        $default = '';
        $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
        $page->add($setting);

        // Heading
        $name = 'theme_space/H2FPHTMLBlock1';
        $heading = get_string('H2FPHTMLBlock1', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('H2FPHTMLBlock1Desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);

        $name = 'theme_space/FPHTMLBlock1Count';
        $title = get_string('FPHTMLBlock1Count', 'theme_space');
        $description = get_string('FPHTMLBlock1CountDesc', 'theme_space');
        $default = 3;
        $options = array();
        for ($i = 1; $i <= 60; $i++) {
            $options[$i] = $i;
        }
        $setting = new admin_setting_configselect($name, $title, $description, $default, $options);

        $page->add($setting);

        $fpblock1count = get_config('theme_space', 'FPHTMLBlock1Count');

        if (!$fpblock1count) {
            $fpblock1count = 1;
        }

        for ($fpblock1index = 1; $fpblock1index <= $fpblock1count; $fpblock1index++) {

            $name = 'theme_space/FPHTMLBlock1Icon' . $fpblock1index;
            $title = get_string('FPHTMLBlock1Icon', 'theme_space');
            $description = get_string('FPHTMLBlock1IconDesc', 'theme_space');
            $setting = new admin_setting_configtext($name, $fpblock1index . $title, $description, $default);

            $page->add($setting);

            $name = 'theme_space/FPHTMLBlock1Heading' . $fpblock1index;
            $title = get_string('FPHTMLBlock1Heading', 'theme_space');
            $description = get_string('FPHTMLBlock1HeadingDesc', 'theme_space');
            $default = '';
            $setting = new admin_setting_configtextarea($name, $fpblock1index . $title, $description, $default);

            $page->add($setting);

            $name = 'theme_space/FPHTMLBlock1Text' . $fpblock1index;
            $title = get_string('FPHTMLBlock1Text', 'theme_space');
            $description = get_string('FPHTMLBlock1TextDesc', 'theme_space');
            $default = '';
            $setting = new admin_setting_confightmleditor($name, $fpblock1index . $title, $description, $default);

            $page->add($setting);

        }


    $settings->add($page);


    /***
    *
    *    Block #2
    *
    ***/
    $page = new admin_settingpage('theme_space_block2', get_string('block2settings', 'theme_space'));
          //HR
          $name = 'theme_space/HR2';
          $heading = get_string('HR2', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR2desc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);

          /***
          *
          *   HTML Block 2
          *
          ***/
          $name = 'theme_space/FPHTMLBlock2';
          $title = get_string('FPHTMLBlock2', 'theme_space');
          $description = get_string('FPHTMLBlock2Desc', 'theme_space');
          $default = 0;
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);


          $name = 'theme_space/ShowFPBlock2Intro';
          $title = get_string('ShowFPBlock2Intro', 'theme_space');
          $description = get_string('ShowFPBlock2IntroDesc', 'theme_space');
          $default = 0;
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);
    
          $name = 'theme_space/FPBlock2Title';
          $title = get_string('FPBlock2Title', 'theme_space');
          $description = get_string('FPBlock2TitleDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $page->add($setting);
    
          $name = 'theme_space/FPBlock2Content';
          $title = get_string('FPBlock2Content', 'theme_space');
          $description = get_string('FPBlock2ContentDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
          $page->add($setting);
          
          $name = 'theme_space/FPHTMLBlock2Count';
          $title = get_string('FPHTMLBlock2Count', 'theme_space');
          $description = get_string('FPHTMLBlock2CountDesc', 'theme_space');
          $default = 2;
          $options = array();
          for ($i = 1; $i <= 60; $i++) {
              $options[$i] = $i;
          }
          $setting = new admin_setting_configselect($name, $title, $description, $default, $options);

          $page->add($setting);

          $fpblock2count = get_config('theme_space', 'FPHTMLBlock2Count');

          if (!$fpblock2count) {
              $fpblock2count = 1;
          }

          for ($fpblock2index = 1; $fpblock2index <= $fpblock2count; $fpblock2index++) {

              $fileid = 'fpblock2image' . $fpblock2index;
              $name = 'theme_space/fpblock2image' . $fpblock2index;
              $title = get_string('fpblock2image', 'theme_space');
              $description = get_string('fpblock2imagedesc', 'theme_space');
              $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
              $setting = new admin_setting_configstoredfile($name, $fpblock2index . $title, $description, $fileid, 0, $opts);
              $page->add($setting);

              $name = 'theme_space/FPHTMLBlock2ShowImage' . $fpblock2index;
              $title = get_string('FPHTMLBlock2ShowImage', 'theme_space');
              $description = get_string('FPHTMLBlock2ShowImageDesc', 'theme_space');
              $default = 0;
              $setting = new admin_setting_configcheckbox($name, $fpblock2index . $title, $description, $default);
              $page->add($setting);

              $name = 'theme_space/FPHTMLBlock2SubHeading' . $fpblock2index;
              $title = get_string('FPHTMLBlock2SubHeading', 'theme_space');
              $description = get_string('FPHTMLBlock2SubHeadingDesc', 'theme_space');
              $default = '';
              $setting = new admin_setting_configtext($name, $fpblock2index . $title, $description, $default);
              $setting->set_updatedcallback('theme_reset_all_caches');
              $page->add($setting);

              $name = 'theme_space/FPHTMLBlock2Heading' . $fpblock2index;
              $title = get_string('FPHTMLBlock2Heading', 'theme_space');
              $description = get_string('FPHTMLBlock2HeadingDesc', 'theme_space');
              $default = '';
              $setting = new admin_setting_configtext($name, $fpblock2index . $title, $description, $default);

              $page->add($setting);

              $name = 'theme_space/FPHTMLBlock2Text' . $fpblock2index;
              $title = get_string('FPHTMLBlock2Text', 'theme_space');
              $description = get_string('FPHTMLBlock2TextDesc', 'theme_space');
              $default = '';
              $setting = new admin_setting_confightmleditor($name, $fpblock2index . $title, $description, $default);

              $page->add($setting);

              $name = 'theme_space/FPHTMLBlock2Label' . $fpblock2index;
              $title = get_string('FPHTMLBlock2Label', 'theme_space');
              $description = get_string('FPHTMLBlock2LabelDesc', 'theme_space');
              $default = '';
              $setting = new admin_setting_configtext($name, $fpblock2index . $title, $description, $default);

              $page->add($setting);

              $name = 'theme_space/FPHTMLBlock2URL' . $fpblock2index;
              $title = get_string('FPHTMLBlock2URL', 'theme_space');
              $description = get_string('FPHTMLBlock2URLDesc', 'theme_space');
              $default = '';
              $setting = new admin_setting_configtext($name, $fpblock2index . $title, $description, $default);

              $page->add($setting);
          }


    $settings->add($page);


    /***
    *
    *    Block #3
    *
    ***/
    $page = new admin_settingpage('theme_space_block3', get_string('block3settings', 'theme_space'));
          //HR
          $name = 'theme_space/HR3';
          $heading = get_string('HR3', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR3desc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);

          /***
          *
          *   HTML Block 3
          *
          ***/
          $name = 'theme_space/FPHTMLBlock3';
          $title = get_string('FPHTMLBlock3', 'theme_space');
          $description = get_string('FPHTMLBlock3Desc', 'theme_space');
          $default = '0';
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

          $name = 'theme_space/FPHTMLBlock3Icon';
          $title = get_string('FPHTMLBlock3Icon', 'theme_space');
          $description = get_string('FPHTMLBlock3IconDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLBlock3Heading';
          $title = get_string('FPHTMLBlock3Heading', 'theme_space');
          $description = get_string('FPHTMLBlock3HeadingDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLBlock3Text';
          $title = get_string('FPHTMLBlock3Text', 'theme_space');
          $description = get_string('FPHTMLBlock3TextDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLBlock3Label';
          $title = get_string('FPHTMLBlock3Label', 'theme_space');
          $description = get_string('FPHTMLBlock3LabelDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLBlock3URL';
          $title = get_string('FPHTMLBlock3URL', 'theme_space');
          $description = get_string('FPHTMLBlock3URLDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/fphtmlblock3bgimg';
  				$title = get_string('fphtmlblock3bgimg', 'theme_space');
  				$description = get_string('fphtmlblock3bgimgdesc', 'theme_space');
  				$opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
  				$setting = new admin_setting_configstoredfile($name, $title, $description, 'fphtmlblock3bgimg', 0, $opts);
  				$setting->set_updatedcallback('theme_reset_all_caches');
  				$page->add($setting);

    $settings->add($page);

    /***
    *
    *    Block #4
    *
    ***/
    $page = new admin_settingpage('theme_space_block4', get_string('block4settings', 'theme_space'));
          //HR
          $name = 'theme_space/HR4';
          $heading = get_string('HR4', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR4desc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);

          /***
          *
          *   HTML Block 4
          *
          ***/
          $name = 'theme_space/FPHTMLBlock4';
          $title = get_string('FPHTMLBlock4', 'theme_space');
          $description = get_string('FPHTMLBlock4Desc', 'theme_space');
          $default = '0';
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

          $name = 'theme_space/FPHTMLBlock4Subheading';
          $title = get_string('FPHTMLBlock4Subheading', 'theme_space');
          $description = get_string('FPHTMLBlock4SubheadingDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLBlock4Heading';
          $title = get_string('FPHTMLBlock4Heading', 'theme_space');
          $description = get_string('FPHTMLBlock4HeadingDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLBlock4Text';
          $title = get_string('FPHTMLBlock4Text', 'theme_space');
          $description = get_string('FPHTMLBlock4TextDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLBlock4Content';
          $title = get_string('FPHTMLBlock4Content', 'theme_space');
          $description = get_string('FPHTMLBlock4ContentDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);


    $settings->add($page);


    /***
    *
    *    Block #5
    *
    ***/
    $page = new admin_settingpage('theme_space_block5', get_string('block5settings', 'theme_space'));
          //HR
          $name = 'theme_space/HR';
          $heading = get_string('HR', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRdesc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);


          /***
          *
          *    Custom Category Block
          *
          ***/
          $name = 'theme_space/FPHTMLCustomCategoryBlock';
          $title = get_string('FPHTMLCustomCategoryBlock', 'theme_space');
          $description = get_string('FPHTMLCustomCategoryBlockDesc', 'theme_space');
          $default = '0';
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

          $name = 'theme_space/FPHTMLCustomCategoryIcon';
          $title = get_string('FPHTMLCustomCategoryIcon', 'theme_space');
          $description = get_string('FPHTMLCustomCategoryIconDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLCustomCategoryHeading';
          $title = get_string('FPHTMLCustomCategoryHeading', 'theme_space');
          $description = get_string('FPHTMLCustomCategoryHeadingDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLCustomCategoryContent';
          $title = get_string('FPHTMLCustomCategoryContent', 'theme_space');
          $description = get_string('FPHTMLCustomCategoryContentDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLCustomCategoryBlockHTML1';
          $title = get_string('FPHTMLCustomCategoryBlockHTML1', 'theme_space');
          $description = get_string('FPHTMLCustomCategoryBlockHTML1Desc', 'theme_space');
          $default = '';
          $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLCustomCategoryBlockHTML2';
          $title = get_string('FPHTMLCustomCategoryBlockHTML2', 'theme_space');
          $description = get_string('FPHTMLCustomCategoryBlockHTML2Desc', 'theme_space');
          $default = '';
          $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          $name = 'theme_space/FPHTMLCustomCategoryBlockHTML3';
          $title = get_string('FPHTMLCustomCategoryBlockHTML3', 'theme_space');
          $description = get_string('FPHTMLCustomCategoryBlockHTML3Desc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

    $settings->add($page);



    $page = new admin_settingpage('theme_space_logos', get_string('logossettings', 'theme_space'));


              //HR
              $name = 'theme_space/HRLogo';
              $heading = get_string('HRLogo', 'theme_space');
              $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRLogodesc', 'theme_space'), FORMAT_MARKDOWN));
              $page->add($setting);

          		$name = 'theme_space/FPLogos';
          		$title = get_string('FPLogos', 'theme_space');
          		$description = get_string('FPLogosDesc', 'theme_space');
          		$default = 0;
          		$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          		$page->add($setting);

          		$name = 'theme_space/FPLogosSubHeading';
          		$title = get_string('FPLogosSubHeading', 'theme_space');
          		$description = get_string('FPLogosSubHeadingDesc', 'theme_space');
          		$default = '';
          		$setting = new admin_setting_configtext($name, $title, $description, $default);
          		$setting->set_updatedcallback('theme_reset_all_caches');
          		$page->add($setting);

          		$name = 'theme_space/FPLogosHeading';
          		$title = get_string('FPLogosHeading', 'theme_space');
          		$description = get_string('FPLogosHeadingDesc', 'theme_space');
          		$default = '';
          		$setting = new admin_setting_configtext($name, $title, $description, $default);
          		$setting->set_updatedcallback('theme_reset_all_caches');
          		$page->add($setting);

          		$name = 'theme_space/FPLogosText';
          		$title = get_string('FPLogosText', 'theme_space');
          		$description = get_string('FPLogosTextDesc', 'theme_space');
          		$default = '';
          		$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
          		$setting->set_updatedcallback('theme_reset_all_caches');
          		$page->add($setting);

          	    $name = 'theme_space/logosperrow';
          	    $title = get_string('logosperrow', 'theme_space');
          	    $description = get_string('logosperrowdesc', 'theme_space');
          	    $default = 1;
          	    $options = array();
          	    $options[1] = '6 per row';
          	    $options[2] = '4 per row';
          	    $options[3] = '3 per row';
          	    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
          	    $setting->set_updatedcallback('theme_reset_all_caches');
          	    $page->add($setting);

          		$name = 'theme_space/logoscount';
          		$title = get_string('logoscount', 'theme_space');
          		$description = get_string('logoscountdesc', 'theme_space');
          		$default = 1;
          		$options = array();
          		for ($i = 1; $i <= 30; $i++) {
          		  $options[$i] = $i;
          		}
          		$setting = new admin_setting_configselect($name, $title, $description, $default, $options);
          		$setting->set_updatedcallback('theme_reset_all_caches');
          		$page->add($setting);


          		$logoscount = get_config('theme_space', 'logoscount');

              //HR
              $name = 'theme_space/HR10';
              $heading = get_string('HR10', 'theme_space');
              $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR10desc', 'theme_space'), FORMAT_MARKDOWN));
              $page->add($setting);

          		if (!$logoscount) {
          		    $logoscount = 1;
          		}

          		for ($logosindex = 1; $logosindex <= $logoscount; $logosindex++) {
          		    $fileid = 'logosimage' . $logosindex;
          		    $name = 'theme_space/logosimage' . $logosindex;
          		    $title = get_string('logosimage', 'theme_space');
          		    $description = get_string('logosimagedesc', 'theme_space');
          		    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
          		    $setting = new admin_setting_configstoredfile($name, $logosindex . $title, $description, $fileid, 0, $opts);
          		    $setting->set_updatedcallback('theme_reset_all_caches');
          		    $page->add($setting);

          		    $name = 'theme_space/logosurl' . $logosindex;
          		    $title = get_string('logosurl', 'theme_space');
          		    $description = get_string('logosurldesc', 'theme_space');
          		    $default = '';
          		    $setting = new admin_setting_configtext($name, $logosindex . $title, $description, $default);
          		    $setting->set_updatedcallback('theme_reset_all_caches');
          		    $page->add($setting);

          		    $name = 'theme_space/logosname' . $logosindex;
          		    $title = get_string('logosname', 'theme_space');
          		    $description = get_string('logosnamedesc', 'theme_space');
          		    $setting = new admin_setting_configtext($name, $logosindex . $title, $description, $default);
          		    $setting->set_updatedcallback('theme_reset_all_caches');
          		    $page->add($setting);

          		}

    $settings->add($page);


    $page = new admin_settingpage('theme_space_team', get_string('teamsettings', 'theme_space'));

              //HR
              $name = 'theme_space/HRTeam';
              $heading = get_string('HRTeam', 'theme_space');
              $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRTeamdesc', 'theme_space'), FORMAT_MARKDOWN));
              $page->add($setting);

              /***
              *
              *   Team
              *
              ***/
              $name = 'theme_space/FPTeam';
              $title = get_string('FPTeam', 'theme_space');
              $description = get_string('FPTeamDesc', 'theme_space');
              $default = 0;
              $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
              $page->add($setting);

              $name = 'theme_space/teammemberno';
              $title = get_string('teammemberno', 'theme_space');
              $description = get_string('teammembernodesc', 'theme_space');
              $default = 1;
              $options = array();
              $options[1] = '6 per row';
              $options[2] = '4 per row';
              $options[3] = '3 per row';
              $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
              $setting->set_updatedcallback('theme_reset_all_caches');
              $page->add($setting);

              $name = 'theme_space/FPTeamSubHeading';
              $title = get_string('FPTeamSubHeading', 'theme_space');
              $description = get_string('FPTeamSubHeadingDesc', 'theme_space');
              $default = '';
              $setting = new admin_setting_configtext($name, $title, $description, $default);
              $setting->set_updatedcallback('theme_reset_all_caches');
              $page->add($setting);

              $name = 'theme_space/FPTeamHeading';
              $title = get_string('FPTeamHeading', 'theme_space');
              $description = get_string('FPTeamHeadingDesc', 'theme_space');
              $default = '';
              $setting = new admin_setting_configtext($name, $title, $description, $default);
              $setting->set_updatedcallback('theme_reset_all_caches');
              $page->add($setting);

              $name = 'theme_space/FPTeamText';
              $title = get_string('FPTeamText', 'theme_space');
              $description = get_string('FPTeamTextDesc', 'theme_space');
              $default = '';
              $setting = new admin_setting_configtextarea($name, $title, $description, $default);
              $setting->set_updatedcallback('theme_reset_all_caches');
              $page->add($setting);

              $name = 'theme_space/teamcount';
              $title = get_string('teamcount', 'theme_space');
              $description = get_string('teamcountdesc', 'theme_space');
              $default = 1;
              $options = array();
              for ($i = 1; $i <= 60; $i++) {
                  $options[$i] = $i;
              }
              $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
              $setting->set_updatedcallback('theme_reset_all_caches');
              $page->add($setting);

              $teamcount = get_config('theme_space', 'teamcount');

              //HR
              $name = 'theme_space/HR9';
              $heading = get_string('HR9', 'theme_space');
              $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR9desc', 'theme_space'), FORMAT_MARKDOWN));
              $page->add($setting);

              if (!$teamcount) {
                  $teamcount = 1;
              }

              for ($teamindex = 1; $teamindex <= $teamcount; $teamindex++) {
                  $fileid = 'teamimage' . $teamindex;
                  $name = 'theme_space/teamimage' . $teamindex;
                  $title = get_string('teamimage', 'theme_space');
                  $description = get_string('teamimagedesc', 'theme_space');
                  $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
                  $setting = new admin_setting_configstoredfile($name, $teamindex . $title, $description, $fileid, 0, $opts);
                  $setting->set_updatedcallback('theme_reset_all_caches');
                  $page->add($setting);

                  $name = 'theme_space/teamurl' . $teamindex;
                  $title = get_string('teamurl', 'theme_space');
                  $description = get_string('teamurldesc', 'theme_space');
                  $default = '';
                  $setting = new admin_setting_configtext($name, $teamindex . $title, $description, $default);
                  $setting->set_updatedcallback('theme_reset_all_caches');
                  $page->add($setting);

                  $name = 'theme_space/teamname' . $teamindex;
                  $title = get_string('teamname', 'theme_space');
                  $description = get_string('teamnamedesc', 'theme_space');
                  $setting = new admin_setting_configtext($name, $teamindex . $title, $description, $default);
                  $setting->set_updatedcallback('theme_reset_all_caches');
                  $page->add($setting);

                  $name = 'theme_space/teamtext' . $teamindex;
                  $title = get_string('teamtext', 'theme_space');
                  $description = get_string('teamtextdesc', 'theme_space');
                  $default = '';
                  $setting = new admin_setting_configtextarea($name, $teamindex . $title, $description, $default);
                  $setting->set_updatedcallback('theme_reset_all_caches');
                  $page->add($setting);

                  $name = 'theme_space/teamcustomhtml' . $teamindex;
                  $title = get_string('teamcustom', 'theme_space');
                  $description = get_string('teamcustomdesc', 'theme_space');
                  $default = '';
                  $setting = new admin_setting_configtextarea($name, $teamindex . $title, $description, $default);
                  $setting->set_updatedcallback('theme_reset_all_caches');
                  $page->add($setting);
              }

    $settings->add($page);



    /***
    *
    *   Top Bar
    *
    ***/
    $page = new admin_settingpage('theme_space_topbar', get_string('topbarsettings', 'theme_space'));

          //HR
          $name = 'theme_space/HR24';
          $heading = get_string('HR24', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR24desc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);

          $name = 'theme_space/topbarstyle';
          $title = get_string('topbarstyle', 'theme_space');
          $description = get_string('topbarstyledesc', 'theme_space');
          $choices = array(
            "topbarstyle-1" => "Style 1",
            "topbarstyle-2" => "Style 2",
            "topbarstyle-3" => "Style 3",
            "topbarstyle-4" => "Style 4",
            "topbarstyle-5" => "Style 5",
            "topbarstyle-6" => "Style 6"            
          );        
          $setting = new admin_setting_configselect($name, $title, $description, 'topbarstyle-1', $choices);
          $page->add($setting);

          // Top Bar Logo
          $name = 'theme_space/customlogotopbar';
          $title = get_string('customlogotopbar', 'theme_space');
          $description = get_string('customlogotopbardesc', 'theme_space');
          $opts = array('accepted_types' => array('.png', '.jpg', '.svg', 'gif'));
          $setting = new admin_setting_configstoredfile($name, $title, $description, 'customlogotopbar', 0, $opts);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          //HR
          $name = 'theme_space/HRTopBar';
          $heading = get_string('HRTopBar', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRTopBardesc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);

          // Show Top Bar Text
          $name = 'theme_space/ShowTopBarText';
          $title = get_string('ShowTopBarText', 'theme_space');
          $description = get_string('ShowTopBarTextDesc', 'theme_space');
          $default = '0';
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

          // Top Bar Text
          $name = 'theme_space/TopBarText';
          $title = get_string('TopBarText', 'theme_space');
          $description = get_string('TopBarTextDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $page->add($setting);

          //HR
          $name = 'theme_space/HR16';
          $heading = get_string('HR16', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR16desc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);

          //HR
          $name = 'theme_space/HRCustomNav';
          $heading = get_string('HRCustomNav', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRCustomNavdesc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);

            // Custom nav
            $name = 'theme_space/customtopnavhtml';
            $title = get_string('customtopnavhtml', 'theme_space');
            $description = get_string('customtopnavhtmldesc', 'theme_space');
            $default = '';
            $setting = new admin_setting_configtextarea($name, $title, $description, $default);
            $page->add($setting);

          /***
          *
          *   Custom navigation
          *
          ***/

          $name = 'theme_space/ShowCustomNav';
          $title = get_string('ShowCustomNav', 'theme_space');
          $description = get_string('ShowCustomNavDesc', 'theme_space');
          $default = '0';
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

          // Custom nav Icon
          $name = 'theme_space/CustomNavIcon';
          $title = get_string('CustomNavIcon', 'theme_space');
          $description = get_string('CustomNavIconDesc', 'theme_space');
          $default = '<i class="fas fa-grip-vertical"></i>';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Custom nav
          $name = 'theme_space/CustomNavHTML';
          $title = get_string('CustomNavHTML', 'theme_space');
          $description = get_string('CustomNavHTMLDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Extra Custom Nav
          $name = 'theme_space/ExtraCustomNavHTML';
          $title = get_string('ExtraCustomNavHTML', 'theme_space');
          $description = get_string('ExtraCustomNavHTMLDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

    $settings->add($page);








    /***
    *
    *   Sidebar
    *
    ***/
    $page = new admin_settingpage('theme_space_sidebar', get_string('sidebarsettings', 'theme_space'));

          $name = 'theme_space/customlogosidebar';
          $title = get_string('customlogosidebar', 'theme_space');
          $description = get_string('customlogosidebardesc', 'theme_space');
          $opts = array('accepted_types' => array('.png', '.jpg', '.svg'));
          $setting = new admin_setting_configstoredfile($name, $title, $description, 'customlogosidebar', 0, $opts);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Show/hide logo
          $name = 'theme_space/showsidebarlogo';
          $title = get_string('showsidebarlogo', 'theme_space');
          $description = get_string('showsidebarlogodesc', 'theme_space');
          $default = 1;
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);        

          // Hidden sidebar
          $name = 'theme_space/hiddensidebar';
          $title = get_string('hiddensidebar', 'theme_space');
          $description = get_string('hiddensidebardesc', 'theme_space');
          $default = 0;
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

          // Expand my coruses
          $name = 'theme_space/showmycourses';
          $title = get_string('showmycourses', 'theme_space');
          $description = get_string('showmycoursesdesc', 'theme_space');
          $default = 0;
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

            
          //HR
          $name = 'theme_space/HR13';
          $heading = get_string('HR13', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR13desc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);

          // Sidebar Custom Heading and Text
          $name = 'theme_space/SidebarCustomBox';
          $title = get_string('SidebarCustomBox', 'theme_space');
          $description = get_string('SidebarCustomBoxDesc', 'theme_space');
          $default = 0;
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

          // Sidebar Custom Heading
          $name = 'theme_space/SidebarCustomHeading';
          $title = get_string('SidebarCustomHeading', 'theme_space');
          $description = get_string('SidebarCustomHeadingDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Sidebar Custom Text.
          $name = 'theme_space/SidebarCustomText';
          $title = get_string('SidebarCustomText', 'theme_space');
          $description = get_string('SidebarCustomTextDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          //HR
          $name = 'theme_space/HR12';
          $heading = get_string('HR12', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR12desc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);

          // Sidebar Custom Nav
          $name = 'theme_space/SidebarCustomNav';
          $title = get_string('SidebarCustomNav', 'theme_space');
          $description = get_string('SidebarCustomNavDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

          // Sidebar Custom Navigation Title.
          $name = 'theme_space/SidebarCustomNavTitle';
          $title = get_string('SidebarCustomNavTitle', 'theme_space');
          $description = get_string('SidebarCustomNavTitleDesc', 'theme_space');
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Sidebar Custom Navigation Links.
          $name = 'theme_space/SidebarCustomNavigationLinks';
          $title = get_string('SidebarCustomNavigationLinks', 'theme_space');
          $description = get_string('SidebarCustomNavigationLinksDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

    $settings->add($page);



    /***
    *
    *   Footer Settings
    *
    ***/
    $page = new admin_settingpage('theme_space_footer', get_string('footersettings', 'theme_space'));

          // Custom Nav
          $name = 'theme_space/footercustomnav';
          $title = get_string('footercustomnav', 'theme_space');
          $description = get_string('footercustomnavdesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          //HR
          $name = 'theme_space/HRFooter';
          $heading = get_string('HRFooter', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRFooterdesc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);

          $name = 'theme_space/showsociallist';
          $title = get_string('showsociallist', 'theme_space');
          $description = get_string('showsociallistDesc', 'theme_space');
          $default = '0';
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

          // Website.
          $name = 'theme_space/website';
          $title = get_string('website', 'theme_space');
          $description = get_string('websitedesc', 'theme_space');
          $default = 'Moodle Themes';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Website.
          $name = 'theme_space/cwebsiteurl';
          $title = get_string('cwebsiteurl', 'theme_space');
          $description = get_string('cwebsiteurldesc', 'theme_space');
          $default = 'http://rosea.io';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Mobile.
          $name = 'theme_space/mobile';
          $title = get_string('mobile', 'theme_space');
          $description = get_string('mobiledesc', 'theme_space');
          $default = 'Mobile : +55 (18) 00123-45678';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Mail.
          $name = 'theme_space/mail';
          $title = get_string('mail', 'theme_space');
          $description = get_string('maildesc', 'theme_space');
          $default = 'sample@mail.com';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Facebook url setting.
          $name = 'theme_space/facebook';
          $title = get_string('facebook', 'theme_space');
          $description = get_string('facebookdesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Twitter url setting.
          $name = 'theme_space/twitter';
          $title = get_string('twitter', 'theme_space');
          $description = get_string('twitterdesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Googleplus url setting.
          $name = 'theme_space/googleplus';
          $title = get_string('googleplus', 'theme_space');
          $description = get_string('googleplusdesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Linkdin url setting.
          $name = 'theme_space/linkedin';
          $title = get_string('linkedin', 'theme_space');
          $description = get_string('linkedindesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Youtube url setting.
          $name = 'theme_space/youtube';
          $title = get_string('youtube', 'theme_space');
          $description = get_string('youtubedesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Instagram url setting.
          $name = 'theme_space/instagram';
          $title = get_string('instagram', 'theme_space');
          $description = get_string('instagramdesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Cutsom icons setting.
          $name = 'theme_space/customsocialicon';
          $title = get_string('customsocialicon', 'theme_space');
          $description = get_string('customsocialicondesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Custom Text
          $name = 'theme_space/CustomFooterText';
          $title = get_string('CustomFooterText', 'theme_space');
          $description = get_string('CustomFooterTextdesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

          // Custom Copyright Text
          $name = 'theme_space/copyrightText';
          $title = get_string('copyrightText', 'theme_space');
          $description = get_string('copyrightTextdesc', 'theme_space');
          $default = 'All rights reserved';
          $setting = new admin_setting_configtext($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);





          //HR
          $name = 'theme_space/HR5';
          $heading = get_string('HR5', 'theme_space');
          $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR5desc', 'theme_space'), FORMAT_MARKDOWN));
          $page->add($setting);





          // Custom Alert
          $name = 'theme_space/CustomAlert';
          $title = get_string('CustomAlert', 'theme_space');
          $description = get_string('CustomAlertDesc', 'theme_space');
          $default = '0';
          $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $page->add($setting);

          $name = 'theme_space/CustomAlertContent';
          $title = get_string('CustomAlertContent', 'theme_space');
          $description = get_string('CustomAlertContentDesc', 'theme_space');
          $default = '';
          $setting = new admin_setting_configtextarea($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
          $page->add($setting);

    $settings->add($page);



    /***
    *
    *  Advanced Settings
    *
    ***/
    $page = new admin_settingpage('theme_space_advanced', get_string('advancedsettings', 'theme_space'));
          $name = 'theme_space/ShowLoader';
  				$title = get_string('ShowLoader', 'theme_space');
  				$description = get_string('ShowLoaderDesc', 'theme_space');
  				$default = 0;
  				$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
          $setting->set_updatedcallback('theme_reset_all_caches');
  				$page->add($setting);

        // Google analytics block.
        $name = 'theme_space/googleanalytics';
        $title = get_string('googleanalytics', 'theme_space');
        $description = get_string('googleanalyticsdesc', 'theme_space');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);




        //HR
        $name = 'theme_space/HR6';
        $heading = get_string('HR6', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR6desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);





        // Raw SCSS to include before the content.
        $setting = new admin_setting_scsscode('theme_space/scsspre',
            get_string('rawscsspre', 'theme_space'), get_string('rawscsspre_desc', 'theme_space'), '', PARAM_RAW);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Raw SCSS to include after the content.
        $setting = new admin_setting_scsscode('theme_space/scss', get_string('rawscss', 'theme_space'),
            get_string('rawscss_desc', 'theme_space'), '', PARAM_RAW);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);





        //HR
        $name = 'theme_space/HR7';
        $heading = get_string('HR7', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR7desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);





        // Google Font.
        $name = 'theme_space/googlefonturl';
        $title = get_string('googlefonturl', 'theme_space');
        $description = get_string('googlefonturldesc', 'theme_space');
        $default = 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,700';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        //HR
        $name = 'theme_space/HR17';
        $heading = get_string('HR17', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR17desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);

        $name = 'theme_space/googlefontname';
        $title = get_string('googlefontname', 'theme_space');
        $description = get_string('googlefontnamedesc', 'theme_space');
        $default = "'Poppins', sans-serif";
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/fontweightlight';
        $title = get_string('fontweightlight', 'theme_space');
        $description = get_string('fontweightlightdesc', 'theme_space');
        $default = '300';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/fontweightregular';
        $title = get_string('fontweightregular', 'theme_space');
        $description = get_string('fontweightregulardesc', 'theme_space');
        $default = '400';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/fontweightmedium';
        $title = get_string('fontweightmedium', 'theme_space');
        $description = get_string('fontweightmediumdesc', 'theme_space');
        $default = '500';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/fontweightbold';
        $title = get_string('fontweightbold', 'theme_space');
        $description = get_string('fontweightbolddesc', 'theme_space');
        $default = '700';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);



        //HR
        $name = 'theme_space/HR8';
        $heading = get_string('HR8', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR8desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);


        // Custom Font
        $name = 'theme_space/CustomWebFont';
        $title = get_string('CustomWebFont', 'theme_space');
        $description = get_string('CustomWebFontDesc', 'theme_space');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/CustomWebFontHTML';
        $title = get_string('CustomWebFontHTML', 'theme_space');
        $description = get_string('CustomWebFontHTMLDesc', 'theme_space');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        //HR
        $name = 'theme_space/HR18';
        $heading = get_string('HR18', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR18desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);

        $name = 'theme_space/CustomWebFontSH';
        $title = get_string('CustomWebFontSH', 'theme_space');
        $description = get_string('CustomWebFontSHDesc', 'theme_space');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        //HR
        $name = 'theme_space/HR19';
        $heading = get_string('HR19', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR19desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);

        $name = 'theme_space/customfontlightname';
        $title = get_string('customfontlightname', 'theme_space');
        $description = get_string('customfontlightnamedesc', 'theme_space');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontlighteot';
        $title = get_string('customfontlighteot', 'theme_space');
        $description = get_string('customfontlighteotdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontlighteot', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontlightwoff';
        $title = get_string('customfontlightwoff', 'theme_space');
        $description = get_string('customfontlightwoffdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontlightwoff', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontlightwoff2';
        $title = get_string('customfontlightwoff2', 'theme_space');
        $description = get_string('customfontlightwoff2desc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontlightwoff2', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontlightttf';
        $title = get_string('customfontlightttf', 'theme_space');
        $description = get_string('customfontlightttfdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontlightttf', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontlightsvg';
        $title = get_string('customfontlightsvg', 'theme_space');
        $description = get_string('customfontlightsvgdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontlightsvg', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);


        //HR
        $name = 'theme_space/HR20';
        $heading = get_string('HR20', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR20desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);


        $name = 'theme_space/customfontregularname';
        $title = get_string('customfontregularname', 'theme_space');
        $description = get_string('customfontregularnamedesc', 'theme_space');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontregulareot';
        $title = get_string('customfontregulareot', 'theme_space');
        $description = get_string('customfontregulareotdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontregulareot', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontregularwoff';
        $title = get_string('customfontregularwoff', 'theme_space');
        $description = get_string('customfontregularwoffdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontregularwoff', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontregularwoff2';
        $title = get_string('customfontregularwoff2', 'theme_space');
        $description = get_string('customfontregularwoff2desc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontregularwoff2', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontregularttf';
        $title = get_string('customfontregularttf', 'theme_space');
        $description = get_string('customfontregularttfdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontregularttf', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontregularsvg';
        $title = get_string('customfontregularsvg', 'theme_space');
        $description = get_string('customfontregularsvgdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontregularsvg', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        //HR
        $name = 'theme_space/HR21';
        $heading = get_string('HR21', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR21desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);

        $name = 'theme_space/customfontmediumname';
        $title = get_string('customfontmediumname', 'theme_space');
        $description = get_string('customfontmediumnamedesc', 'theme_space');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontmediumeot';
        $title = get_string('customfontmediumeot', 'theme_space');
        $description = get_string('customfontmediumeotdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontmediumeot', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontmediumwoff';
        $title = get_string('customfontmediumwoff', 'theme_space');
        $description = get_string('customfontmediumwoffdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontmediumwoff', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontmediumwoff2';
        $title = get_string('customfontmediumwoff2', 'theme_space');
        $description = get_string('customfontmediumwoff2desc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontmediumwoff2', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontmediumttf';
        $title = get_string('customfontmediumttf', 'theme_space');
        $description = get_string('customfontmediumttfdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontmediumttf', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontmediumsvg';
        $title = get_string('customfontmediumsvg', 'theme_space');
        $description = get_string('customfontmediumsvgdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontmediumsvg', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        //HR
        $name = 'theme_space/HR22';
        $heading = get_string('HR22', 'theme_space');
        $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR22desc', 'theme_space'), FORMAT_MARKDOWN));
        $page->add($setting);

        $name = 'theme_space/customfontboldname';
        $title = get_string('customfontboldname', 'theme_space');
        $description = get_string('customfontboldnamedesc', 'theme_space');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontboldeot';
        $title = get_string('customfontboldeot', 'theme_space');
        $description = get_string('customfontboldeotdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontboldeot', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontboldwoff';
        $title = get_string('customfontboldwoff', 'theme_space');
        $description = get_string('customfontboldwoffdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontboldwoff', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontboldwoff2';
        $title = get_string('customfontboldwoff2', 'theme_space');
        $description = get_string('customfontboldwoff2desc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontboldwoff2', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontboldttf';
        $title = get_string('customfontboldttf', 'theme_space');
        $description = get_string('customfontboldttfdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontboldttf', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_space/customfontboldsvg';
        $title = get_string('customfontboldsvg', 'theme_space');
        $description = get_string('customfontboldsvgdesc', 'theme_space');
        $opts = array('accepted_types' => array('*'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontboldsvg', 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
                    
    $settings->add($page);
}

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
 * Mustache helper to load a theme configuration.
 *
 * @package    theme_space
 * @copyright 2018 - 2020 Marcin Czaja - Rosea Themes
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_space\util;

use theme_config;
use stdClass;

defined('MOODLE_INTERNAL') || die();

/**
 * Helper to load a theme configuration.
 *
 * @package    theme_space
 * @copyright 2018 - 2020 Marcin Czaja - Rosea Themes
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class theme_settings {

  /**
   * Get config theme footer itens
   *
   * @return array
   */
  public function sidebar_custom_block() {
      $theme = theme_config::load('space');

      $templatecontext['SidebarCustomBox'] = $theme->settings->SidebarCustomBox;
     
      $templatecontext['SidebarCustomHeading'] = format_text(($theme->settings->SidebarCustomHeading),FORMAT_HTML);
      $templatecontext['SidebarCustomText'] = format_text(($theme->settings->SidebarCustomText),FORMAT_HTML);

      $templatecontext['SidebarCustomNav'] = $theme->settings->SidebarCustomNav;
      $templatecontext['SidebarCustomNavTitle'] = format_text(($theme->settings->SidebarCustomNavTitle),FORMAT_HTML);
      $templatecontext['SidebarCustomNavigationLinks'] = $theme->settings->SidebarCustomNavigationLinks;

      $templatecontext['customlogosidebar'] = $theme->setting_file_url('customlogosidebar', 'customlogosidebar');
      $templatecontext['showmycourses'] = $theme->settings->showmycourses; 
      $templatecontext['hiddensidebar'] = $theme->settings->hiddensidebar; 
      $templatecontext['showsidebarlogo'] = $theme->settings->showsidebarlogo; 

      return $templatecontext;
  }

  public function login_block() {
      global $OUTPUT;
      $theme = theme_config::load('space');

      $templatecontext['loginbg'] = $theme->setting_file_url('loginbg', 'loginbg');
      $templatecontext['showlbg'] = $theme->settings->showlbg;

      return $templatecontext;
  }


  /**
   * Get config theme team and urls
   *
   * @return array
   */
  public function team() {
      global $OUTPUT;
      $theme = theme_config::load('space');


      /***
      *
      *   Team
      *
      ***/
      $templatecontext['FPTeam'] = $theme->settings->FPTeam;
      $templatecontext['FPTeamSubHeading'] = format_text(($theme->settings->FPTeamSubHeading),FORMAT_HTML);
      $templatecontext['FPTeamHeading'] = format_text(($theme->settings->FPTeamHeading),FORMAT_HTML);
      $templatecontext['FPTeamText'] = format_text(($theme->settings->FPTeamText),FORMAT_HTML);
      $templatecontext['teammemberno'] = $theme->settings->teammemberno;

      $teamcount = $theme->settings->teamcount;

      for ($i = 1, $j = 0; $i <= $teamcount; $i++, $j++) {
          $teamimage = "teamimage{$i}";
          $teamurl = "teamurl{$i}";
          $teamname = "teamname{$i}";
          $teamtext = "teamtext{$i}";
          $teamcustomhtml = "teamcustomhtml{$i}";

          $image = $theme->setting_file_url($teamimage, $teamimage);
          if (empty($image)) {
              continue;
          }

          $templatecontext['team'][$j]['image'] = $image;
          $templatecontext['team'][$j]['teamurl'] = format_text(($theme->settings->$teamurl),FORMAT_HTML);
          $templatecontext['team'][$j]['teamname'] = format_text(($theme->settings->$teamname),FORMAT_HTML);
          $templatecontext['team'][$j]['teamtext'] = format_text(($theme->settings->$teamtext),FORMAT_HTML);
          $templatecontext['team'][$j]['teamcustomhtml'] = format_text(($theme->settings->$teamcustomhtml),FORMAT_HTML);

      }

      return $templatecontext;
  }

   /**
   * Get config theme siemaSlider and urls
   *
   * @return array
   */
   public function siemaSlider() {
       global $OUTPUT;
       $theme = theme_config::load('space');

       $templatecontext['sliderenabled'] = $theme->settings->sliderenabled;
       $templatecontext['sliderfwenabled'] = $theme->settings->sliderfwenabled;
       $templatecontext['sliderintervalenabled'] = $theme->settings->sliderintervalenabled;
       $templatecontext['sliderinterval'] = $theme->settings->sliderinterval;

       if (empty($templatecontext['sliderenabled'])) {
           return $templatecontext;
       }

       $slidercount = $theme->settings->slidercount;

       for ($i = 1, $j = 0; $i <= $slidercount; $i++, $j++) {
           $sliderimage = "sliderimage{$i}";
           $slidertitle = "slidertitle{$i}";
           $slidersubtitle = "slidersubtitle{$i}";
           $slidercap = "slidercap{$i}";

           $templatecontext['slides'][$j]['key'] = $j;
           $templatecontext['slides'][$j]['active'] = false;

           $image = $theme->setting_file_url($sliderimage, $sliderimage);
           if (empty($image)) {
               $image = $OUTPUT->image_url('slide_default', 'theme');
           }
           $templatecontext['slides'][$j]['image'] = $image;
           $templatecontext['slides'][$j]['title'] = format_text(($theme->settings->$slidertitle),FORMAT_HTML);
           $templatecontext['slides'][$j]['subtitle'] = format_text(($theme->settings->$slidersubtitle),FORMAT_HTML);
           $templatecontext['slides'][$j]['caption'] = format_text(($theme->settings->$slidercap),FORMAT_HTML);

           if ($i === 1) {
               $templatecontext['slides'][$j]['active'] = true;
           }
       }

       return $templatecontext;
   }

  public function logos() {
    global $OUTPUT;
	  $theme = theme_config::load('space');

		$templatecontext['FPLogos'] = $theme->settings->FPLogos;
		$templatecontext['FPLogosSubHeading'] = format_text(($theme->settings->FPLogosSubHeading),FORMAT_HTML);
		$templatecontext['FPLogosHeading'] = format_text(($theme->settings->FPLogosHeading),FORMAT_HTML);
		$templatecontext['FPLogosText'] = format_text(($theme->settings->FPLogosText),FORMAT_HTML);

		$logoscount = $theme->settings->logoscount;

		for ($i = 1, $j = 0; $i <= $logoscount; $i++, $j++) {
		  $logosimage = "logosimage{$i}";
		  $logosurl = "logosurl{$i}";
		  $logosname = "logosname{$i}";

		  $image = $theme->setting_file_url($logosimage, $logosimage);
		  if (empty($image)) {
		      continue;
		  }

		  $templatecontext['logos'][$j]['image'] = $image;
		  $templatecontext['logos'][$j]['logosurl'] = format_text(($theme->settings->$logosurl),FORMAT_HTML);
		  $templatecontext['logos'][$j]['logosname'] = format_text(($theme->settings->$logosname),FORMAT_HTML);
		}

		return $templatecontext;
  }

	/**
	* Get config theme Custom Nav and urls
	*
	* @return array
	*/
	public function customnav() {
		$theme = theme_config::load('space');
		$templatecontext['CustomNavIcon'] = $theme->settings->CustomNavIcon;
		$templatecontext['CustomNavHTML'] = format_text(($theme->settings->CustomNavHTML),FORMAT_HTML);
		$templatecontext['ExtraCustomNavHTML'] = format_text(($theme->settings->ExtraCustomNavHTML),FORMAT_HTML);
		$templatecontext['ShowCustomNav'] = $theme->settings->ShowCustomNav;

		return $templatecontext;
	}


  public function hero() {
    global $OUTPUT;
		$theme = theme_config::load('space');

		/***
		*
		*   HERO
		*
		***/

		$templatecontext['herofwenabled'] = $theme->settings->herofwenabled;
		$templatecontext['heroimg'] = $theme->setting_file_url('heroimg', 'heroimg');
		$templatecontext['HeroHeading'] = format_text(($theme->settings->HeroHeading),FORMAT_HTML);
		$templatecontext['HeroText'] = format_text(($theme->settings->HeroText),FORMAT_HTML);
		$templatecontext['HeroText2'] = format_text(($theme->settings->HeroText2),FORMAT_HTML);
		$templatecontext['HeroLabel'] = format_text(($theme->settings->HeroLabel),FORMAT_HTML);
		$templatecontext['HeroURL'] = format_text(($theme->settings->HeroURL),FORMAT_HTML);
		$templatecontext['HeroLabel2'] = format_text(($theme->settings->HeroLabel2),FORMAT_HTML);
    $templatecontext['HeroURL2'] = format_text(($theme->settings->HeroURL2),FORMAT_HTML);
    
    $templatecontext['showherologo'] = $theme->settings->showherologo; 

    return $templatecontext;
  }


  public function blockcategories() {
    global $OUTPUT;
    $theme = theme_config::load('space');
    /***
		*
		*   Custom Category Block
		*
		***/
		$templatecontext['FPHTMLCustomCategoryBlock'] = $theme->settings->FPHTMLCustomCategoryBlock;
		$templatecontext['FPHTMLCustomCategoryHeading'] = format_text(($theme->settings->FPHTMLCustomCategoryHeading),FORMAT_HTML);
		$templatecontext['FPHTMLCustomCategoryIcon'] = $theme->settings->FPHTMLCustomCategoryIcon;
		$templatecontext['FPHTMLCustomCategoryContent'] = format_string(($theme->settings->FPHTMLCustomCategoryContent),FORMAT_HTML);

		$templatecontext['FPHTMLCustomCategoryBlockHTML1'] = format_text(($theme->settings->FPHTMLCustomCategoryBlockHTML1),FORMAT_HTML);
		$templatecontext['FPHTMLCustomCategoryBlockHTML2'] = format_text(($theme->settings->FPHTMLCustomCategoryBlockHTML2),FORMAT_HTML);

		$templatecontext['FPHTMLCustomCategoryBlockHTML3'] = $theme->settings->FPHTMLCustomCategoryBlockHTML3;

    return $templatecontext;
  }


  public function block1() {
    global $OUTPUT;
    $theme = theme_config::load('space');
    /***
    *
    *   HTML Block #1
    *
    ***/
    $templatecontext['FPHTMLBlock1'] = $theme->settings->FPHTMLBlock1;
    $templatecontext['ShowFPBlock1Intro'] = $theme->settings->ShowFPBlock1Intro;
    $templatecontext['FPBlock1Title'] = format_text(($theme->settings->FPBlock1Title),FORMAT_HTML);
    $templatecontext['FPBlock1Content'] = format_text(($theme->settings->FPBlock1Content),FORMAT_HTML);
    $fpblock1count = $theme->settings->FPHTMLBlock1Count;

    for ($i = 1, $j = 0; $i <= $fpblock1count; $i++, $j++) {
      $fpblock1icon = "FPHTMLBlock1Icon{$i}";
      $fpblock1heading = "FPHTMLBlock1Heading{$i}";
      $fpblock1text = "FPHTMLBlock1Text{$i}";

      $fpblock1no = $i;

      $templatecontext['block1'][$j]['FPHTMLBlock1Count'] = $fpblock1no;
      $templatecontext['block1'][$j]['FPHTMLBlock1Icon'] = format_text(($theme->settings->$fpblock1icon),FORMAT_HTML);
      $templatecontext['block1'][$j]['FPHTMLBlock1Heading'] = format_text(($theme->settings->$fpblock1heading),FORMAT_HTML);
      $templatecontext['block1'][$j]['FPHTMLBlock1Text'] = format_text(($theme->settings->$fpblock1text),FORMAT_HTML);
    }

    return $templatecontext;
  }

  public function block2() {
    global $OUTPUT;
    $theme = theme_config::load('space');
    /***
		*
		*   HTML Block #2
		*
		***/
		$templatecontext['FPHTMLBlock2'] = $theme->settings->FPHTMLBlock2;
    $templatecontext['ShowFPBlock2Intro'] = $theme->settings->ShowFPBlock2Intro;
    $templatecontext['FPBlock2Title'] = format_text(($theme->settings->FPBlock2Title),FORMAT_HTML);
    $templatecontext['FPBlock2Content'] = format_text(($theme->settings->FPBlock2Content),FORMAT_HTML);
		$fpblock2count = $theme->settings->FPHTMLBlock2Count;

		for ($i = 1, $j = 0; $i <= $fpblock2count; $i++, $j++) {
			$fpblock2heading = "FPHTMLBlock2Heading{$i}";
      $fpblock2showimage = "FPHTMLBlock2ShowImage{$i}";
      $fpblock2subheading = "FPHTMLBlock2SubHeading{$i}";
			$fpblock2text = "FPHTMLBlock2Text{$i}";
			$fpblock2label = "FPHTMLBlock2Label{$i}";
			$fpblock2url = "FPHTMLBlock2URL{$i}";
			$fpblock2no = $i;

      $templatecontext['block2'][$j]['FPHTMLBlock2ShowImage'] = format_text(($theme->settings->$fpblock2showimage),FORMAT_HTML);

			$templatecontext['block2'][$j]['FPHTMLBlock2Count'] = $fpblock2no;
			$templatecontext['block2'][$j]['FPHTMLBlock2Heading'] = format_text(($theme->settings->$fpblock2heading),FORMAT_HTML);
			$templatecontext['block2'][$j]['FPHTMLBlock2SubHeading'] = format_text(($theme->settings->$fpblock2subheading),FORMAT_HTML);
			$templatecontext['block2'][$j]['FPHTMLBlock2Text'] = format_text(($theme->settings->$fpblock2text),FORMAT_HTML);
			$templatecontext['block2'][$j]['FPHTMLBlock2Label'] = format_text(($theme->settings->$fpblock2label),FORMAT_HTML);
			$templatecontext['block2'][$j]['FPHTMLBlock2URL'] = format_text(($theme->settings->$fpblock2url),FORMAT_HTML);

      $fpblock2image = "fpblock2image{$i}";
			$image = $theme->setting_file_url($fpblock2image, $fpblock2image);
			if (empty($image)) {
			    continue;
			}
			$templatecontext['block2'][$j]['image'] = $image;

		}
    return $templatecontext;
  }

  public function block3() {
    global $OUTPUT;
    $theme = theme_config::load('space');
  	/***
  	*
  	*   HTML Block 3
  	*
  	***/
  	$templatecontext['FPHTMLBlock3'] = $theme->settings->FPHTMLBlock3;
  	$templatecontext['FPHTMLBlock3Icon'] = $theme->settings->FPHTMLBlock3Icon;
  	$templatecontext['FPHTMLBlock3Heading'] = format_text(($theme->settings->FPHTMLBlock3Heading),FORMAT_HTML);
  	$templatecontext['FPHTMLBlock3Text'] = format_text(($theme->settings->FPHTMLBlock3Text),FORMAT_HTML);
  	$templatecontext['FPHTMLBlock3Label'] = format_text(($theme->settings->FPHTMLBlock3Label),FORMAT_HTML);
  	$templatecontext['FPHTMLBlock3URL'] = format_text(($theme->settings->FPHTMLBlock3URL),FORMAT_HTML);
    $templatecontext['fphtmlblock3bgimg'] = $theme->setting_file_url('fphtmlblock3bgimg', 'fphtmlblock3bgimg');
    return $templatecontext;
  }

  public function block4() {
    global $OUTPUT;
    $theme = theme_config::load('space');
    /***
		*
		*   HTML Block 4
		*
		***/
		$templatecontext['FPHTMLBlock4'] = $theme->settings->FPHTMLBlock4;
		$templatecontext['FPHTMLBlock4Subheading'] = format_text(($theme->settings->FPHTMLBlock4Subheading),FORMAT_HTML);
		$templatecontext['FPHTMLBlock4Heading'] = format_text(($theme->settings->FPHTMLBlock4Heading),FORMAT_HTML);
		$templatecontext['FPHTMLBlock4Text'] = format_text(($theme->settings->FPHTMLBlock4Text),FORMAT_HTML);
		$templatecontext['FPHTMLBlock4Content'] = format_text(($theme->settings->FPHTMLBlock4Content),FORMAT_HTML);
    return $templatecontext;
  }

  public function top_bar_custom_block() {
      $theme = theme_config::load('space');

      $templatecontext['ShowTopBarText'] = $theme->settings->ShowTopBarText;
      $templatecontext['TopBarText'] = format_text(($theme->settings->TopBarText),FORMAT_HTML);
      $templatecontext['customtopnavhtml'] = $theme->settings->customtopnavhtml;
      $templatecontext['customlogotopbar'] = $theme->setting_file_url('customlogotopbar', 'customlogotopbar');

      return $templatecontext;
  }

  public function head_elements() {
      $theme = theme_config::load('space');

      $templatecontext['googlefonturl'] = $theme->settings->googlefonturl;
      $templatecontext['googlefontname'] = $theme->settings->googlefontname;
      $templatecontext['ShowLoader'] = $theme->settings->ShowLoader;
      $templatecontext['CustomWebFont'] = $theme->settings->CustomWebFont;
      $templatecontext['CustomWebFontSH'] = $theme->settings->CustomWebFontSH;
      $templatecontext['CustomWebFontHTML'] = $theme->settings->CustomWebFontHTML;

      $templatecontext['customfontregularname'] = $theme->settings->customfontregularname;
      $templatecontext['customfontregulareot'] = $theme->setting_file_url('customfontregulareot', 'customfontregulareot');
      $templatecontext['customfontregularwoff'] = $theme->setting_file_url('customfontregularwoff', 'customfontregularwoff');
      $templatecontext['customfontregularwoff2'] = $theme->setting_file_url('customfontregularwoff2', 'customfontregularwoff2');
      $templatecontext['customfontregularttf'] = $theme->setting_file_url('customfontregularttf', 'customfontregularttf');
      $templatecontext['customfontregularsvg'] = $theme->setting_file_url('customfontregularsvg', 'customfontregularsvg');

      $templatecontext['customfontlightname'] = $theme->settings->customfontlightname;
      $templatecontext['customfontlighteot'] = $theme->setting_file_url('customfontlighteot', 'customfontlighteot');
      $templatecontext['customfontlightwoff'] = $theme->setting_file_url('customfontlightwoff', 'customfontlightwoff');
      $templatecontext['customfontlightwoff2'] = $theme->setting_file_url('customfontlightwoff2', 'customfontlightwoff2');
      $templatecontext['customfontlightttf'] = $theme->setting_file_url('customfontlightttf', 'customfontlightttf');
      $templatecontext['customfontlightsvg'] = $theme->setting_file_url('customfontlightsvg', 'customfontlightsvg');

      $templatecontext['customfontmediumname'] = $theme->settings->customfontmediumname;
      $templatecontext['customfontmediumeot'] = $theme->setting_file_url('customfontmediumeot', 'customfontmediumeot');
      $templatecontext['customfontmediumwoff'] = $theme->setting_file_url('customfontmediumwoff', 'customfontmediumwoff');
      $templatecontext['customfontmediumwoff2'] = $theme->setting_file_url('customfontmediumwoff2', 'customfontmediumwoff2');
      $templatecontext['customfontmediumttf'] = $theme->setting_file_url('customfontmediumttf', 'customfontmediumttf');
      $templatecontext['customfontmediumsvg'] = $theme->setting_file_url('customfontmediumsvg', 'customfontmediumsvg');
      
      $templatecontext['customfontboldname'] = $theme->settings->customfontboldname;
      $templatecontext['customfontboldeot'] = $theme->setting_file_url('customfontboldeot', 'customfontboldeot');
      $templatecontext['customfontboldwoff'] = $theme->setting_file_url('customfontboldwoff', 'customfontboldwoff');
      $templatecontext['customfontboldwoff2'] = $theme->setting_file_url('customfontboldwoff2', 'customfontboldwoff2');
      $templatecontext['customfontboldttf'] = $theme->setting_file_url('customfontboldttf', 'customfontboldttf');
      $templatecontext['customfontboldsvg'] = $theme->setting_file_url('customfontboldsvg', 'customfontboldsvg');

      $templatecontext['showauthorinfo'] = $theme->settings->showauthorinfo;

      return $templatecontext;
  }

  /**
   * Get config theme footer itens
   *
   * @return array
   */
  public function footer_items() {
      $theme = theme_config::load('space');

      $templatecontext = [];

      $templatecontext['showsociallist'] = $theme->settings->showsociallist;

      $footersettings = [
          'facebook', 'twitter', 'googleplus', 'linkedin', 'youtube', 'instagram',
          'cwebsiteurl', 'website', 'mobile', 'mail', 'customsocialicon'
      ];

      foreach ($footersettings as $setting) {
          if (!empty($theme->settings->$setting)) {
              $templatecontext[$setting] = $theme->settings->$setting;
          }
      }

      $templatecontext['footercustomnav'] = format_text(($theme->settings->footercustomnav),FORMAT_HTML);
      $templatecontext['CustomFooterText'] = format_text(($theme->settings->CustomFooterText),FORMAT_HTML);
      $templatecontext['copyrightText'] = format_text(($theme->settings->copyrightText),FORMAT_HTML);

      $templatecontext['CustomAlert'] = $theme->settings->CustomAlert;
      $templatecontext['CustomAlertContent'] = format_text(($theme->settings->CustomAlertContent),FORMAT_HTML);

      return $templatecontext;
  }

}

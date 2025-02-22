<?php

/**
 * @copyright Copyright (C) 2015-2017 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

use app\components\db\Migration;
use app\models\Gear2;
use yii\db\Expression;
use yii\helpers\Json;

class m171215_094104_gear2 extends Migration
{
    public function safeUp()
    {
        // $this->makeUpdateData();
        // return false;
        $data = $this->getUpdateData();
        $updateCase = new Expression(sprintf(
            '(CASE %s %s END)',
            $this->db->quoteColumnName('key'),
            implode(' ', array_map(
                fn (string $key, int $value): string => sprintf(
                    'WHEN %s THEN %s',
                    $this->db->quoteValue($key),
                    $this->db->quoteValue($value),
                ),
                array_keys($data),
                array_values($data),
            )),
        ));
        $this->update(
            'gear2',
            ['splatnet' => $updateCase],
            ['key' => array_keys($data)],
        );
    }

    public function safeDown()
    {
        $data = $this->getUpdateData();
        $this->update(
            'gear2',
            ['splatnet' => null],
            ['key' => array_keys($data)],
        );
    }

    private function makeUpdateData(): void
    {
        $json = Json::decode(
            file_get_contents(__FILE__, false, null, __COMPILER_HALT_OFFSET__),
        );
        $upd = [];
        foreach ($json as $key => $id) {
            if ($gear = Gear2::findOne(['key' => $key])) {
                if ((int)$id !== (int)$gear->splatnet) {
                    printf("'%s' => %d,\n", $key, $id);
                }
            } else {
                printf("WARNING: gear does not exist. '%s' => %d\n", $key, $id);
            }
        }
    }

    public function getUpdateData(): array
    {
        return [
            'sage_polo' => 4003,
        ];
    }
}

// phpcs:disable
__halt_compiler();
{
  "18k_aviators": 3008, 
  "acerola_rain_boots": 6005, 
  "aloha_shirt": 8005, 
  "amber_sea_slug_hi_tops": 2023, 
  "anchor_life_vest": 21001, 
  "anchor_sweat": 7006, 
  "angry_rain_boots": 21001, 
  "annaki_beret": 2009, 
  "annaki_blue_cuff": 7010, 
  "annaki_drive_tee": 2015, 
  "annaki_evolution_tee": 2017, 
  "annaki_habaneros": 8010, 
  "annaki_mask": 8005, 
  "annaki_red_cuff": 7012, 
  "armor_boot_replicas": 27004, 
  "armor_helmet_replica": 27004, 
  "armor_jacket_replica": 27004, 
  "arrow_pull_ons": 3013, 
  "b_ball_headband": 9001, 
  "b_ball_jersey_away": 6001, 
  "b_ball_jersey_home": 6000, 
  "baby_jelly_shirt": 8007, 
  "baby_jelly_shirt_and_tie": 8021, 
  "backwards_cap": 1009, 
  "bamboo_hat": 4004, 
  "baseball_jersey": 8008, 
  "basic_tee": 2, 
  "berry_ski_jacket": 5002, 
  "bike_helmet": 7000, 
  "birch_climbing_shoes": 1013, 
  "birded_corduroy_jacket": 5024, 
  "black_8_bit_fishfry": 1021, 
  "black_anchor_tee": 1023, 
  "black_arrowbands": 3004, 
  "black_baseball_ls": 2006, 
  "black_dakroniks": 2012, 
  "black_flip_flops": 4008, 
  "black_inky_rider": 5006, 
  "black_ls": 2001, 
  "black_norimaki_750s": 2015, 
  "black_polo": 4004, 
  "black_seahorses": 1005, 
  "black_squideye": 1001, 
  "black_tee": 1006, 
  "black_trainers": 3009, 
  "black_urchin_rock_tee": 1037, 
  "black_v_neck_tee": 1030, 
  "blowfish_bell_hat": 4003, 
  "blue_and_black_squidkid_iv": 2018, 
  "blue_laceless_dakroniks": 1016, 
  "blue_lo_tops": 1000, 
  "blue_moto_boots": 6003, 
  "blue_peaks_tee": 1015, 
  "blue_sailor_suit": 5012, 
  "blue_slip_ons": 7000, 
  "blue_tentatek_tee": 3011, 
  "blueberry_casuals": 4002, 
  "bobble_hat": 2000, 
  "brown_fa_11_bomber": 5030, 
  "bubble_rain_boots": 6009, 
  "bucket_hat": 4008, 
  "camo_mesh": 1006, 
  "camo_zip_hoodie": 10000, 
  "camping_hat": 4002, 
  "canary_trainers": 3011, 
  "carnivore_tee": 1026, 
  "cherry_kicks": 8001, 
  "chilly_mountain_coat": 5017, 
  "chirpy_chips_band_tee": 1042, 
  "choco_clogs": 4001, 
  "choco_layered_ls": 3006, 
  "classic_straw_boater": 4006, 
  "clownfish_basics": 1006, 
  "crazy_arrows": 3008, 
  "cream_basics": 1, 
  "crimson_parashooter": 8020, 
  "custom_painted_f_3": 5035, 
  "cyan_trainers": 3004, 
  "cycle_king_cap": 1014, 
  "cycle_king_jersey": 4006, 
  "cycling_cap": 1012, 
  "cycling_shirt": 4005, 
  "dark_bomber_jacket": 5036, 
  "dark_urban_vest": 9002, 
  "deepsea_leather_boots": 6014, 
  "designer_headphones": 5001, 
  "double_egg_shades": 3012, 
  "dust_blocker_2000": 21001, 
  "eggplant_mountain_coat": 5027, 
  "fa_01_jacket": 5020, 
  "fa_01_reversed": 5021, 
  "face_visor": 6004, 
  "fake_contacts": 3007, 
  "fc_albacore": 4008, 
  "firefin_facemask": 8008, 
  "firefin_navy_sweat": 7003, 
  "firewave_tee": 1048, 
  "fishfry_biscuit_bandana": 9007, 
  "fishfry_visor": 6001, 
  "fishing_vest": 9007, 
  "five_panel_cap": 1007, 
  "forge_inkling_parka": 5010, 
  "forge_mask": 8011, 
  "fringed_loafers": 25003, 
  "front_zip_vest": 9008, 
  "fugu_bell_hat": 4011, 
  "fugu_tee": 1010, 
  "full_moon_glasses": 3009, 
  "gold_hi_horses": 2006, 
  "grape_hoodie": 10005, 
  "grape_tee": 1012, 
  "gray_8_bit_fishfry": 1034, 
  "gray_college_sweat": 7000, 
  "gray_fa_11_bomber": 5031, 
  "gray_hoodie": 10006, 
  "gray_mixed_shirt": 8009, 
  "gray_sea_slug_hi_tops": 2019, 
  "gray_yellow_soled_wingtips": 8008, 
  "green_check_shirt": 8002, 
  "green_iromaki_750s": 2029, 
  "green_laceups": 1014, 
  "green_rain_boots": 6004, 
  "green_striped_ls": 2009, 
  "green_tee": 3009, 
  "green_v_neck_limited_tee": 1045, 
  "green_zip_hoodie": 10001, 
  "half_rim_glasses": 3011, 
  "half_sleeve_sweater": 1032, 
  "headlamp_helmet": 21000, 
  "hero_headphones_replica": 27101, 
  "hero_headset_replica": 27000, 
  "hero_hoodie_replica": 27101, 
  "hero_jacket_replica": 27000, 
  "hero_runner_replicas": 27000, 
  "hero_snowboots_replicas": 27101, 
  "hickory_work_cap": 1020, 
  "hightide_era_band_tee": 1043, 
  "hockey_helmet": 7007, 
  "house_tag_denim_cap": 1024, 
  "hula_punk_shirt": 8017, 
  "hunter_hi_tops": 2004, 
  "hunting_boots": 6012, 
  "icewave_tee": 1055, 
  "imperial_kaiser": 2021, 
  "inkfall_shirt": 8019, 
  "inkopolis_squaps_jersey": 2014, 
  "jellyvader_cap": 1023, 
  "jet_cap": 1011, 
  "juice_parka": 21002, 
  "jungle_hat": 4001, 
  "kaiser_cuff": 10000, 
  "kensa_coat": 5023, 
  "kid_clams": 8005, 
  "king_bench_kaiser": 5032, 
  "king_facemask": 8009, 
  "king_flip_mesh": 1019, 
  "king_jersey": 1033, 
  "knitted_hat": 2008, 
  "krak_on_528": 5016, 
  "layered_anchor_ls": 3005, 
  "layered_vector_ls": 3008, 
  "le_soccer_shoes": 1011, 
  "light_bomber_jacket": 5029, 
  "lightweight_cap": 1001, 
  "lime_easy_stripe_shirt": 2016, 
  "linen_shirt": 8014, 
  "logo_aloha_shirt": 8012, 
  "lumberjack_shirt": 8000, 
  "luminous_delta_straps": 4010, 
  "matcha_down_jacket": 5019, 
  "matte_bike_helmet": 7008, 
  "mawcasins": 2009, 
  "mint_dakroniks": 2011, 
  "mint_tee": 1011, 
  "mister_shrug_tee": 1041, 
  "moist_ghillie_boots": 6015, 
  "moist_ghillie_helmet": 7010, 
  "moist_ghillie_suit": 5037, 
  "moto_boots": 6000, 
  "motocross_nose_guard": 8010, 
  "mountain_vest": 9000, 
  "mtb_helmet": 7006, 
  "n_pacer_ag": 3016, 
  "n_pacer_au": 3017, 
  "n_pacer_sweat": 7013, 
  "navy_deca_logo_tee": 1040, 
  "navy_eminence_jacket": 5033, 
  "navy_enperrials": 2022, 
  "navy_king_tank": 6005, 
  "navy_red_soled_wingtips": 8007, 
  "navy_striped_ls": 2003, 
  "negative_longcuff_sweater": 7007, 
  "neon_delta_straps": 4007, 
  "neon_sea_slugs": 3002, 
  "noise_cancelers": 5002, 
  "octobowler_shirt": 8018, 
  "olive_ski_jacket": 5000, 
  "olive_zekko_parka": 10009, 
  "omega_3_tee": 1046, 
  "orange_arrows": 3001, 
  "orange_cardigan": 5009, 
  "orca_hi_tops": 2020, 
  "orca_woven_hi_tops": 2028, 
  "oyster_clogs": 4000, 
  "paintball_mask": 8001, 
  "painters_mask": 8004, 
  "paisley_bandana": 8002, 
  "part_time_pirate": 3007, 
  "patched_hat": 4009, 
  "pearl_tee": 1027, 
  "pilot_goggles": 3002, 
  "pink_easy_stripe_shirt": 2013, 
  "pink_hoodie": 10008, 
  "pink_trainers": 3000, 
  "piranha_moccasins": 2013, 
  "pirate_stripe_tee": 1018, 
  "plum_casuals": 4003, 
  "polka_dot_slip_ons": 7003, 
  "positive_longcuff_sweater": 7009, 
  "power_armor": 25002, 
  "power_armor_mk_i": 25005, 
  "power_boots": 25002, 
  "power_boots_mk_i": 25005, 
  "power_mask": 25002, 
  "power_mask_mk_i": 25005, 
  "pro_trail_boots": 5002, 
  "prune_parashooter": 8022, 
  "pullover_coat": 5022, 
  "punk_blacks": 6013, 
  "punk_cherries": 6007, 
  "punk_whites": 6006, 
  "purple_camo_ls": 2002, 
  "purple_hi_horses": 2003, 
  "purple_iromaki_750s": 2030, 
  "purple_sea_slugs": 3007, 
  "rainy_day_tee": 1008, 
  "red_and_black_squidkid_iv": 2017, 
  "red_fishfry_sandals": 4011, 
  "red_hi_horses": 2000, 
  "red_hi_tops": 2005, 
  "red_hula_punk_with_tie": 8023, 
  "red_iromaki_750s": 2031, 
  "red_mesh_sneakers": 3014, 
  "red_sea_slugs": 3006, 
  "red_slip_ons": 7001, 
  "red_tentatek_tee": 3010, 
  "red_v_neck_limited_tee": 1044, 
  "red_vector_tee": 1013, 
  "reel_sweat": 7005, 
  "reggae_tee": 1009, 
  "retro_specs": 3000, 
  "retro_sweat": 7002, 
  "roasted_brogues": 8004, 
  "rockenberg_white": 1004, 
  "rodeo_shirt": 8001, 
  "round_collar_shirt": 8011, 
  "safari_hat": 4000, 
  "sage_polo": 4003, 
  "sailor_stripe_tee": 1019, 
  "samurai_helmet": 25001, 
  "samurai_jacket": 25001, 
  "samurai_shoes": 25001, 
  "school_cardigan": 25003, 
  "school_jersey": 5004, 
  "school_shoes": 25000, 
  "school_uniform": 25000, 
  "shark_moccasins": 2008, 
  "shirt_and_tie": 8015, 
  "shirt_with_blue_hoodie": 10004, 
  "short_beanie": 2001, 
  "short_knit_layers": 7008, 
  "shrimp_pink_polo": 4000, 
  "skate_helmet": 7004, 
  "skull_bandana": 8003, 
  "sky_blue_squideye": 1003, 
  "slash_king_tank": 6004, 
  "slipstream_united": 4007, 
  "smoky_wingtips": 8006, 
  "sneaky_beanie": 2011, 
  "snorkel_mask": 3005, 
  "snow_delta_straps": 4009, 
  "snowy_down_boots": 6010, 
  "soccer_headband": 9005, 
  "soccer_shoes": 1010, 
  "special_forces_beret": 2004, 
  "splash_goggles": 3001, 
  "splatfest_tee": 26000, 
  "sporty_bobble_hat": 2003, 
  "squash_headband": 9002, 
  "squid_clip_ons": 25003, 
  "squid_facemask": 8007, 
  "squid_hairclip": 25000, 
  "squid_satin_jacket": 5014, 
  "squid_squad_band_tee": 1039, 
  "squid_stitch_slip_ons": 7002, 
  "squiddor_polo": 21000, 
  "squidfin_hook_cans": 5003, 
  "squidlife_headphones": 5004, 
  "squidmark_ls": 2010, 
  "squidmark_sweat": 7001, 
  "squidstar_waistcoat": 9005, 
  "squidvader_cap": 1005, 
  "squinja_boots": 25004, 
  "squinja_mask": 25004, 
  "squinja_suit": 25004, 
  "squink_wingtips": 8003, 
  "stealth_goggles": 7002, 
  "strapping_reds": 1009, 
  "strapping_whites": 1008, 
  "straw_boater": 4005, 
  "streetstyle_cap": 1003, 
  "striped_beanie": 2002, 
  "striped_shirt": 8013, 
  "studio_headphones": 5000, 
  "sun_and_shade_squidkid_iv": 2027, 
  "sun_visor": 6002, 
  "sunny_climbing_shoes": 1012, 
  "sunny_day_tee": 1007, 
  "sunset_orca_hi_tops": 2016, 
  "takoroka_galactic_tie_dye": 1049, 
  "takoroka_mesh": 1002, 
  "takoroka_nylon_vintage": 5001, 
  "takoroka_rainbow_tie_dye": 1050, 
  "takoroka_visor": 6003, 
  "takoroka_windcrusher": 5018, 
  "tan_work_boots": 6001, 
  "tennis_headband": 9003, 
  "tentatek_slogan_tee": 1054, 
  "tinted_shades": 3003, 
  "trail_boots": 5000, 
  "treasure_hunter": 4007, 
  "tricolor_rugby": 4002, 
  "tulip_parasol": 4010, 
  "tumeric_zekko_coat": 5034, 
  "turquoise_kicks": 8002, 
  "two_stripe_mesh": 1010, 
  "urchins_cap": 1000, 
  "urchins_jersey": 8004, 
  "varsity_baseball_ls": 2005, 
  "varsity_jacket": 5003, 
  "vintage_check_shirt": 8010, 
  "violet_trainers": 3010, 
  "visor_skate_helmet": 7005, 
  "wet_floor_band_tee": 1038, 
  "white_8_bit_fishfry": 1020, 
  "white_anchor_tee": 1022, 
  "white_arrows": 3003, 
  "white_baseball_ls": 2007, 
  "white_deca_logo_tee": 1031, 
  "white_headband": 1, 
  "white_inky_rider": 5007, 
  "white_kicks": 8000, 
  "white_king_tank": 6003, 
  "white_laceless_dakroniks": 1015, 
  "white_layered_ls": 3000, 
  "white_norimaki_750s": 2014, 
  "white_sailor_suit": 5013, 
  "white_seahorses": 1003, 
  "white_shirt": 8003, 
  "white_striped_ls": 2000, 
  "white_tee": 1000, 
  "white_urchin_rock_tee": 1036, 
  "white_v_neck_tee": 1035, 
  "woolly_urchins_classic": 1021, 
  "yamagiri_beanie": 2010, 
  "yellow_iromaki_750s": 2024, 
  "yellow_layered_ls": 3001, 
  "yellow_mesh_sneakers": 3012, 
  "yellow_urban_vest": 9003, 
  "zapfish_satin_jacket": 5015, 
  "zekko_baseball_ls": 2004, 
  "zekko_hoodie": 10002, 
  "zekko_jade_coat": 5028, 
  "zekko_long_carrot_tee": 2018, 
  "zekko_long_radish_tee": 2019, 
  "zekko_redleaf_coat": 5026, 
  "zink_layered_ls": 3004, 
  "zombie_hi_horses": 2001
}

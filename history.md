#hiqdev/hipanel-module-dashboard

## [Under development]

- Added go to site menu item
    - [ddfa925] 2017-06-19 renamed `web` config <- hisite [@hiqsol]
    - [e1d16c1] 2017-06-19 renamed `hidev.yml` [@hiqsol]
    - [84ab189] 2017-06-19 added GoToSiteMenu [@hiqsol]
- Fixed dashboard page: count and links
    - [e854622] 2017-06-08 Fixed dashboard Client widget search attribute. Change `login_like` to `login_ilike` [@tafid]
    - [d0bdcb7] 2017-05-31 csfixed [@hiqsol]
    - [e4af503] 2017-02-22 fixed typo [@hiqsol]
    - [9e7548b] 2017-02-01 improved total domains count in dashboard [@hiqsol]
    - [4c3a181] 2017-01-31 fixed link to buy domain [@hiqsol]
    - [a284ba7] 2016-12-22 redone yii2-thememanager -> yii2-menus [@hiqsol]
    - [f2d161d] 2016-12-21 moved menus definitions to DI [@hiqsol]
    - [dbb615d] 2016-12-02 Made View in Domain block is shown [@tafid]
    - [1d87c63] 2016-11-15 translation [@tafid]
    - [1d9cb1f] 2016-11-10 Added all search elements to input-group [@tafid]
    - [479c697] 2016-11-10 Added new box - Tariff [@tafid]
    - [c3a92ea] 2016-11-09 Added Client small box [@tafid]
    - [ad8416e] 2016-11-09 Fixed Finance view when bill serch form shown [@tafid]
    - [a68aa84] 2016-11-07 Added Model block [@tafid]
    - [8b7e86e] 2016-11-07 Added Part block [@tafid]
    - [e456575] 2016-11-07 Added SearchForm widget [@tafid]
    - [9955adf] 2016-11-07 Added SearchForm widget [@tafid]
    - [0e0770e] 2016-11-06 redone translation category to `hipanel:dashboard` <- hipanel/dashboard [@hiqsol]
    - [964a2ea] 2016-11-03 Added font size attribute [@tafid]
    - [3b08f2d] 2016-11-03 Applyed SmallBox widget to dashboard index [@tafid]
    - [501ee66] 2016-11-03 Added new widget SmallBox [@tafid]
    - [669e254] 2016-11-01 fixed permissions [@hiqsol]
    - [8de3fba] 2016-10-31 hidden Balance block from those who can not deposit [@hiqsol]
    - [c0dd4cb] 2016-09-22 removed unused hidev config [@hiqsol]
    - [f8da9a6] 2016-09-22 minor renaming [@hiqsol]
    - [1e4aaaa] 2016-09-22 redone menu to new style [@hiqsol]
    - [2f2b85e] 2016-08-01 fixed app -> hipanel in translations [@hiqsol]
    - [b899ff9] 2016-06-14 Fixed counters display for managers [@SilverFire]
    - [a2ee6d6] 2016-06-14 Updated translations [@SilverFire]
    - [7ed5adc] 2016-05-18 fixing dependencies constraints [@hiqsol]
    - [6578b3c] 2016-05-18 fixed menus [@hiqsol]
    - [d884b65] 2016-05-18 moved plugins requirement to composer.json [@hiqsol]
    - [f7e3855] 2016-05-18 used composer-config-plugin [@hiqsol]
- Fixed minor issues and code style
    - [648cf0c] 2016-04-14 php-cs-fixed [@hiqsol]
    - [5754d18] 2016-04-14 rehideved [@hiqsol]
    - [2ddd646] 2016-04-14 inited empty tests [@hiqsol]
    - [e60e1fb] 2016-04-13 Add more responsive blocks placement [@tafid]
    - [6a9ac76] 2015-12-09 Removed PHP short-tags [@SilverFire]
    - [5441b82] 2015-10-27 * deposit link to @pay/deposit <- @bill/deposit [@hiqsol]
    - [dcf420f] 2015-09-24 fixed SidebarMenu where to be first [@hiqsol]
- Added initial dashboard with 4 blocks for domains, servers, tickets and balance
    - [666c23c] 2015-09-16 x fix conflicts [@BladeRoot]
    - [fa8d59b] 2015-09-16 * add translate directive to words [@hiqsol]
    - [55912d3] 2015-09-16 + translation [@hiqsol]
    - [2360aa3] 2015-09-15 localized menu [@hiqsol]
    - [93c5d58] 2015-09-04 + check if @domain exists [@hiqsol]
    - [ba31269] 2015-08-28 Added dependencies on related projects [@SilverFire]
    - [4e7b830] 2015-08-24 + hide Domain block if not available [@hiqsol]
    - [74101ca] 2015-08-19 + actual dashboard [@hiqsol]
- Changed: moved to src
    - [35b6c23] 2015-08-19 still moving to src [@hiqsol]
    - [e271464] 2015-08-19 php-cs-fixed [@hiqsol]
    - [01f32cf] 2015-08-19 moved to src [@hiqsol]
    - [41ca035] 2015-08-19 rehideved [@hiqsol]
- Added basics
    - [7745a38] 2015-06-02 - license, cause it is defined in parent [@hiqsol]
    - [d00ce9a] 2015-06-02 fixed typo [@hiqsol]
    - [85cd20d] 2015-06-01 used new hidev with YAML config [@hiqsol]
    - [52ead9c] 2015-05-25 fixed namepace [@hiqsol]
    - [8b687bb] 2015-05-21 inited [@hiqsol]

## [Development started] - 2015-05-21

[@hiqsol]: https://github.com/hiqsol
[sol@hiqdev.com]: https://github.com/hiqsol
[@SilverFire]: https://github.com/SilverFire
[d.naumenko.a@gmail.com]: https://github.com/SilverFire
[@tafid]: https://github.com/tafid
[andreyklochok@gmail.com]: https://github.com/tafid
[@BladeRoot]: https://github.com/BladeRoot
[bladeroot@gmail.com]: https://github.com/BladeRoot
[648cf0c]: https://github.com/hiqdev/hipanel-module-dashboard/commit/648cf0c
[5754d18]: https://github.com/hiqdev/hipanel-module-dashboard/commit/5754d18
[2ddd646]: https://github.com/hiqdev/hipanel-module-dashboard/commit/2ddd646
[e60e1fb]: https://github.com/hiqdev/hipanel-module-dashboard/commit/e60e1fb
[6a9ac76]: https://github.com/hiqdev/hipanel-module-dashboard/commit/6a9ac76
[5441b82]: https://github.com/hiqdev/hipanel-module-dashboard/commit/5441b82
[dcf420f]: https://github.com/hiqdev/hipanel-module-dashboard/commit/dcf420f
[666c23c]: https://github.com/hiqdev/hipanel-module-dashboard/commit/666c23c
[fa8d59b]: https://github.com/hiqdev/hipanel-module-dashboard/commit/fa8d59b
[55912d3]: https://github.com/hiqdev/hipanel-module-dashboard/commit/55912d3
[2360aa3]: https://github.com/hiqdev/hipanel-module-dashboard/commit/2360aa3
[93c5d58]: https://github.com/hiqdev/hipanel-module-dashboard/commit/93c5d58
[ba31269]: https://github.com/hiqdev/hipanel-module-dashboard/commit/ba31269
[4e7b830]: https://github.com/hiqdev/hipanel-module-dashboard/commit/4e7b830
[74101ca]: https://github.com/hiqdev/hipanel-module-dashboard/commit/74101ca
[35b6c23]: https://github.com/hiqdev/hipanel-module-dashboard/commit/35b6c23
[e271464]: https://github.com/hiqdev/hipanel-module-dashboard/commit/e271464
[01f32cf]: https://github.com/hiqdev/hipanel-module-dashboard/commit/01f32cf
[41ca035]: https://github.com/hiqdev/hipanel-module-dashboard/commit/41ca035
[7745a38]: https://github.com/hiqdev/hipanel-module-dashboard/commit/7745a38
[d00ce9a]: https://github.com/hiqdev/hipanel-module-dashboard/commit/d00ce9a
[85cd20d]: https://github.com/hiqdev/hipanel-module-dashboard/commit/85cd20d
[52ead9c]: https://github.com/hiqdev/hipanel-module-dashboard/commit/52ead9c
[8b687bb]: https://github.com/hiqdev/hipanel-module-dashboard/commit/8b687bb
[ddfa925]: https://github.com/hiqdev/hipanel-module-dashboard/commit/ddfa925
[e1d16c1]: https://github.com/hiqdev/hipanel-module-dashboard/commit/e1d16c1
[84ab189]: https://github.com/hiqdev/hipanel-module-dashboard/commit/84ab189
[e854622]: https://github.com/hiqdev/hipanel-module-dashboard/commit/e854622
[d0bdcb7]: https://github.com/hiqdev/hipanel-module-dashboard/commit/d0bdcb7
[e4af503]: https://github.com/hiqdev/hipanel-module-dashboard/commit/e4af503
[9e7548b]: https://github.com/hiqdev/hipanel-module-dashboard/commit/9e7548b
[4c3a181]: https://github.com/hiqdev/hipanel-module-dashboard/commit/4c3a181
[a284ba7]: https://github.com/hiqdev/hipanel-module-dashboard/commit/a284ba7
[f2d161d]: https://github.com/hiqdev/hipanel-module-dashboard/commit/f2d161d
[dbb615d]: https://github.com/hiqdev/hipanel-module-dashboard/commit/dbb615d
[1d87c63]: https://github.com/hiqdev/hipanel-module-dashboard/commit/1d87c63
[1d9cb1f]: https://github.com/hiqdev/hipanel-module-dashboard/commit/1d9cb1f
[479c697]: https://github.com/hiqdev/hipanel-module-dashboard/commit/479c697
[c3a92ea]: https://github.com/hiqdev/hipanel-module-dashboard/commit/c3a92ea
[ad8416e]: https://github.com/hiqdev/hipanel-module-dashboard/commit/ad8416e
[a68aa84]: https://github.com/hiqdev/hipanel-module-dashboard/commit/a68aa84
[8b7e86e]: https://github.com/hiqdev/hipanel-module-dashboard/commit/8b7e86e
[e456575]: https://github.com/hiqdev/hipanel-module-dashboard/commit/e456575
[9955adf]: https://github.com/hiqdev/hipanel-module-dashboard/commit/9955adf
[0e0770e]: https://github.com/hiqdev/hipanel-module-dashboard/commit/0e0770e
[964a2ea]: https://github.com/hiqdev/hipanel-module-dashboard/commit/964a2ea
[3b08f2d]: https://github.com/hiqdev/hipanel-module-dashboard/commit/3b08f2d
[501ee66]: https://github.com/hiqdev/hipanel-module-dashboard/commit/501ee66
[669e254]: https://github.com/hiqdev/hipanel-module-dashboard/commit/669e254
[8de3fba]: https://github.com/hiqdev/hipanel-module-dashboard/commit/8de3fba
[c0dd4cb]: https://github.com/hiqdev/hipanel-module-dashboard/commit/c0dd4cb
[f8da9a6]: https://github.com/hiqdev/hipanel-module-dashboard/commit/f8da9a6
[1e4aaaa]: https://github.com/hiqdev/hipanel-module-dashboard/commit/1e4aaaa
[2f2b85e]: https://github.com/hiqdev/hipanel-module-dashboard/commit/2f2b85e
[b899ff9]: https://github.com/hiqdev/hipanel-module-dashboard/commit/b899ff9
[a2ee6d6]: https://github.com/hiqdev/hipanel-module-dashboard/commit/a2ee6d6
[7ed5adc]: https://github.com/hiqdev/hipanel-module-dashboard/commit/7ed5adc
[6578b3c]: https://github.com/hiqdev/hipanel-module-dashboard/commit/6578b3c
[d884b65]: https://github.com/hiqdev/hipanel-module-dashboard/commit/d884b65
[f7e3855]: https://github.com/hiqdev/hipanel-module-dashboard/commit/f7e3855
[Under development]: https://github.com/hiqdev/hipanel-module-dashboard/releases

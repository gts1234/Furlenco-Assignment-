# Furlenco-Assignment-
This Project is a Music Web Application.<br />
Technology Stack:<br />
Frontend - BootStrap(HTML,CSS,Javascript)<br />
Backend - PHP,MySQL<br />
NOTE- To test the features you have to log on to www.rollside.com<br />

Features Added:<br />
1.Login With Facebook Plugin.<br />
2.Create a Playlist.<br />
3.Browse through all playlists shared and created by user.<br />
4.Edit Playlist like Adding and Removing songs.<br />
5.Songs can be embedded from Soundcloud and Youtube.<br />
6.Share Playlist with friends.<br />
7.Play Song and Enjoy.<br />
NOTE-Hosting used for website has less resources.I apologize for extra delay in testing assignment.<br />

Bonus Features:<br />
1.Search is provided.<br />
2.Two sources(soundcloud,youtube) from where music can be added.<br />
3.Can Play Music.<br />
4.Metadata is figured out at Server Side.<br />

RELATED TO ASSIGNMENT WORK:<br />
1.index.php-line no.(36-92)<br />
2.MyPlaylist.php - line no.(50-84,268-282)<br />
3.ShowPlaylist.php - line no.(297-418)<br />
4.track.php - line no.(293-336)<br />
/Classes/<br />
1.DisplayClass.php - line no.(618-726)<br />
2.InterfaceClass.php- line no.(248-286)<br />
3.LoginClass.php - line no.(259-280)<br />
/PHP/<br />
All files are related to Assignment work.<br />

#Steps To Test Features:
1.Open www.rollside.com<br />
2.Login by clicking login button with facebook integration(If CSS of FB button not loaded then click on small login anchor tag in Bootstrap Modal) used or by creating account on server.<br />
3.After logging in,on main index picture there is User Name Mentioned,click on it and in Drop down Menu Click Playlist.<br />
4.You can create here new playlist.<br />
5.After creating playlist (you can share it as well) click on Home in NAVBAR and then click on track button on Song cards.<br />
6.Then click on Add to Playlist and select playlist from it.<br />
7.Now song has been added to playlist.<br />
8.Now repeat step no. 3 and click on that playlist in which you added song.<br />
9.Song is there in playlist-you can listen to it or remove it.<br />
10.On that page where songs of playlist are shown(Myplaylist.php),there are options to add soundcloud and youtube music.<br />
11.To add youtube music head on to youtube video or music and on it right click and select copy embed code.<br />
12.Paste that code somewhere and from it URL given in src copy it paste in youtube field on my site(without quotes).<br /> 
13.For Soundcloud,you have to copy embed Url Song ID.<br />
14.Head on to Soundcloud.com click on any song and then click share,there is tab called Embed,there is a mentioned integer ID after
"<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/ "...copy that ID and paste in SONG ID Field.Then Click ADD.



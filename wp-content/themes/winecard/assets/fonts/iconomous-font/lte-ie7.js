/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'Iconomous\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-Music' : '&#xe006;',
			'icon-Mail' : '&#xe005;',
			'icon-Cloud' : '&#xe004;',
			'icon-Price' : '&#xe003;',
			'icon-Eye' : '&#xe002;',
			'icon-Camera' : '&#xe001;',
			'icon-Eye-Glasses' : '&#xe000;',
			'icon-Cog' : '&#x3d;',
			'icon-Home' : '&#x22;',
			'icon-Message' : '&#x27;',
			'icon-Mobile' : '&#x7c;',
			'icon-Search' : '&#x7e;',
			'icon-Place' : '&#x5f;',
			'icon-Folder' : '&#x26;',
			'icon-Warning' : '&#x25;',
			'icon-Trash' : '&#x23;',
			'icon-Time' : '&#x40;',
			'icon-Lock' : '&#x21;',
			'icon-Picture' : '&#x3f;',
			'icon-Book' : '&#x2f;',
			'icon-Heart' : '&#x2e;',
			'icon-Briefcase' : '&#x2c;',
			'icon-Gift' : '&#x4d;',
			'icon-Disc' : '&#x4e;',
			'icon-Tablet' : '&#x42;',
			'icon-Game' : '&#x56;',
			'icon-Volume' : '&#x43;',
			'icon-Sound' : '&#x58;',
			'icon-Pie-Chart' : '&#x5a;',
			'icon-Bar-Chart' : '&#x4c;',
			'icon-Line-Chart' : '&#x4b;',
			'icon-Share' : '&#x4a;',
			'icon-Reply' : '&#x48;',
			'icon-Mute' : '&#x47;',
			'icon-Mouse' : '&#x46;',
			'icon-Keyboard' : '&#x44;',
			'icon-Men' : '&#x53;',
			'icon-Women' : '&#x41;',
			'icon-USB' : '&#x50;',
			'icon-Link' : '&#x4f;',
			'icon-Tshirt' : '&#x49;',
			'icon-Newspaper' : '&#x55;',
			'icon-Thunder' : '&#x59;',
			'icon-Star' : '&#x2a;',
			'icon-Flag' : '&#x54;',
			'icon-Rewind' : '&#x7b;',
			'icon-Snowflake' : '&#x52;',
			'icon-Bulb' : '&#x45;',
			'icon-Refresh' : '&#x57;',
			'icon-Key' : '&#x51;',
			'icon-Power' : '&#x6d;',
			'icon-Building' : '&#x6e;',
			'icon-TV' : '&#x62;',
			'icon-Stop' : '&#x63;',
			'icon-PaperPlane' : '&#x7a;',
			'icon-Pause' : '&#x6c;',
			'icon-Money' : '&#x24;',
			'icon-Wallet' : '&#x6b;',
			'icon-Right' : '&#x3e;',
			'icon-Forward' : '&#x7d;',
			'icon-ResizeUp' : '&#x3a;',
			'icon-Food' : '&#x6a;',
			'icon-Play' : '&#x68;',
			'icon-Information' : '&#x69;',
			'icon-Previous' : '&#x28;',
			'icon-Maintenance' : '&#x67;',
			'icon-Thumbnail' : '&#x66;',
			'icon-Up' : '&#x5e;',
			'icon-Cancel' : '&#x78;',
			'icon-User' : '&#x64;',
			'icon-Eject' : '&#x73;',
			'icon-Community' : '&#x61;',
			'icon-ResizeDown' : '&#x3b;',
			'icon-Next' : '&#x29;',
			'icon-Package' : '&#x5c;',
			'icon-Down' : '&#x76;',
			'icon-Ticket' : '&#x70;',
			'icon-Monitor' : '&#x6f;',
			'icon-Plane' : '&#x60;',
			'icon-Phone' : '&#x75;',
			'icon-Minus' : '&#x2d;',
			'icon-Plus' : '&#x2b;',
			'icon-Laptop' : '&#x79;',
			'icon-Calendar' : '&#x74;',
			'icon-Browser' : '&#x72;',
			'icon-Unlock' : '&#x65;',
			'icon-Couch' : '&#x77;',
			'icon-Download' : '&#x71;',
			'icon-Check' : '&#x30;',
			'icon-Left' : '&#x3c;',
			'icon-Pencil' : '&#x39;',
			'icon-Lab' : '&#x38;',
			'icon-Bookmark' : '&#x37;',
			'icon-Video' : '&#x36;',
			'icon-Inbox' : '&#x35;',
			'icon-Cart' : '&#x34;',
			'icon-Upload' : '&#x33;',
			'icon-List' : '&#x32;',
			'icon-Cup' : '&#x31;',
			'icon-Paper' : '&#xe007;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; i < els.length; i += 1) {
		el = els[i];
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};
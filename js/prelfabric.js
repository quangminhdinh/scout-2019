function Compfield(nw, r_left, b_left, tp, width, height) {
	this.comp = new fabric.Rect({
	  left: nw * r_left,
	  top: nw * tp,
	  fill: 'red',
	  width: nw * width,
	  height: nw * height,
	  selectable: false
	});
	this.switch_b = function() {
		this.comp.set({
		  left: nw * b_left
		});
	}
	this.switch_r = function() {
		this.comp.set({
		  left: nw * r_left
		});
	}
	this.update = function() {
		this.comp.setCoords();
	}
}

function GartCanvas(canvas_id, width, height) {
	var canvas = new fabric.Canvas(canvas_id, {
		width: width,
		height: height
	});
	fabric.Image.fromURL('./assets/images/arena.png', function (img) {
		img.set({
			scaleX : width / 955,
			scaleY: height /515
		});
		canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
	});
	this.update = function() {
		canvas.renderAll();
	}
	this.g_add = function(comp_arr) {
		for (var i = 0; i < comp_arr.length; i ++) {
			canvas.add(comp_arr[i].comp);
		}
	}
	this.setEvent = function() {
		canvas.on({
			'mouse:over': function(e) {
				if (e.target) {
					e.target.set('fill', 'violet');
					canvas.renderAll();
				}
			},
			'mouse:out': function(e) {
				if (e.target) {
					e.target.set('fill', 'green');
					canvas.renderAll();
				}
			}
		});
	}
}

function ScoutMap() {
	var info = getInfo();
	var canvas = new GartCanvas('pre-load-gart', info.width, info.height);
	var start = [new Compfield(info.width, 0.857, 0.083, 0.172, 0.05, 0.057),
					new Compfield(info.width, 0.857, 0.083, 0.229, 0.05, 0.076),
					new Compfield(info.width, 0.857, 0.083, 0.305, 0.05, 0.057),
					new Compfield(info.width, 0.9081, 0.01, 0.172, 0.072, 0.057),
					new Compfield(info.width, 0.9081, 0.01, 0.305, 0.072, 0.057)];
	this.setAlliance = function() {
		$('#flat-radio-1').on('ifChecked', function() {
			for (var i = 0; i < start.length; i ++) {
				start[i].switch_r();
				start[i].update();
			}
			canvas.update();
		});
		
		$('#flat-radio-2').on('ifChecked', function() {
			for (var i = 0; i < start.length; i ++) {
				start[i].switch_b();
				start[i].update();
			}
			canvas.update();
		});
	}
	this.setPadding = function() {
		if (info.ratio == 1) {
			var pad = (window.innerWidth - 955 - 30 - 1.25 * 50) / 2;
			$('#container-gart-preload').css('paddingLeft', pad + "px");
			$('#container-gart-preload').css('paddingRight', pad + "px");
		}
	}
	this.ready = function() {
		this.setPadding();
		canvas.setEvent();
		canvas.g_add(start);
		this.setAlliance();
	}
}

function getInfo() {
	var ratio = 1;
	if (window.innerWidth <= 464) {
		ratio = 0.7;
	}
	else if (window.innerWidth <= 594) {
		ratio = 0.75;
	}
	else if (window.innerWidth <= 768) {
		ratio = 0.8;
	}
	else if (window.innerWidth <= 1114) {
		ratio = 0.85;
	}
	var nw = 955;
	var nh = 515;
	if (ratio != 1) {
		nw = window.innerWidth * ratio;
		nh = 515 * nw / 955;
	}
	return {
		ratio: ratio,
		width: nw,
		height: nh
	};
}

$(document).ready(function() {
	var preMap = new ScoutMap();
	preMap.ready();
});
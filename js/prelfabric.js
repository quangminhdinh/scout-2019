function Compfield(m_id, nw, r_left, b_left, tp, width, height, canvas) {
	var comp = new fabric.Rect({
	  id : m_id,
	  left: nw * r_left,
	  top: nw * tp,
	  fill: 'white',
	  opacity: 0.5,
	  width: nw * width,
	  height: nw * height,
	  selectable: false,
	  hoverCursor: "pointer"
	});
	
	this.switch_b = function() {
		comp.set('left', nw * b_left);
		if (canvas.active) {
			canvas.active.set('opacity', 0.5);
			canvas.active = null;
			$('#startpos').val("");
		}
	}
	this.switch_r = function() {
		comp.set('left', nw * r_left);
		if (canvas.active) {
			canvas.active.set('opacity', 0.5);
			canvas.active = null;
			$('#startpos').val("");
		}
	}
	this.update = function() {
		comp.setCoords();
	}
	this.getComp = function() {
		return comp;
	}
	comp.on({
		'mouseover': function() {
			if (!canvas.active || canvas.active.get('id') !== m_id){
				comp.set('opacity', 0.7);
				canvas.update();
			}
		},
		'mouseout': function() {
			if (!canvas.active || canvas.active.get('id') !== m_id){
				comp.set('opacity', 0.5);
				canvas.update();
			}
		},
		'mousedown': function() {
			if (!canvas.active){
				comp.set('opacity', 0.9);
				canvas.update();
				canvas.active = comp;
				$('#startpos').val(m_id);
			} else if (canvas.active.get('id') !== m_id) {
				comp.set('opacity', 0.9);
				canvas.update();
				canvas.active.set('opacity', 0.5);
				canvas.active = comp;
				$('#startpos').val(m_id);
			}
		},
		'touchgesture': function() {
			if (!canvas.active){
				comp.set('opacity', 0.9);
				canvas.update();
				canvas.active = comp;
				$('#startpos').val(m_id);
			} else if (canvas.active.get('id') !== m_id) {
				comp.set('opacity', 0.9);
				canvas.update();
				canvas.active.set('opacity', 0.5);
				canvas.active = comp;
				$('#startpos').val(m_id);
			}
		}
	});
}

function GartCanvas(canvas_id, width, height) {
	var canvas = new fabric.Canvas(canvas_id, {
		width: width,
		height: height,
		selection: false
	});
	var active = null;
	fabric.Image.fromURL('./assets/images/arena.png', function (img) {
		img.set({
			scaleX : width / 955,
			scaleY: height / 515
		});
		canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
	});
	this.update = function() {
		canvas.renderAll();
	}
	this.g_add = function(comp_arr) {
		for (var i = 0; i < comp_arr.length; i ++) {
			canvas.add(comp_arr[i].getComp());
		}
	}
}

function ScoutMap() {
	var info = getInfo();
	var canvas = new GartCanvas('pre-load-gart', info.width, info.height);
	var start = [new Compfield(0, info.width, 0.857, 0.083, 0.172, 0.05, 0.057, canvas),
					new Compfield(1, info.width, 0.857, 0.083, 0.229, 0.05, 0.076, canvas),
					new Compfield(2, info.width, 0.857, 0.083, 0.305, 0.05, 0.057, canvas),
					new Compfield(3, info.width, 0.9081, 0.01, 0.172, 0.072, 0.057, canvas),
					new Compfield(4, info.width, 0.9081, 0.01, 0.305, 0.072, 0.057, canvas)];
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
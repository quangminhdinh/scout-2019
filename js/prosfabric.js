var FULL = true;
var POS_ID = -1;
var BUT_ID = ['gart-climb', 'gart-drop', 'gart-score', 'gart-score-cs', 'gart-pk-hatch', 'gart-pk-cargo', 'gart-load-hatch', 'gart-load-cargo', 'gart-foul', 'gart-break']
var HISTORY = [];
var HISTORY_MSG = "";

function Procfield(m_id, nw, left, tp, width, height, angle) {
	var comp = new fabric.Rect({
	  id : m_id,
	  left: nw * left,
	  top: nw * tp,
	  fill: "green",
	  opacity: 0.4,
	  width: nw * width,
	  height: nw * height,
	  angle: angle,
	  selectable: false,
	  hoverCursor: "pointer"
	});
	this.getComp = function() {
		return comp;
	}
}

function strategyBut (m_id, type, name, pre) {
	this.m_id = m_id;
	var mdtg = '';
	if (m_id === 'gart-score') {
		mdtg = 'data-toggle="modal" data-target="#rkscr"';
	} else if (m_id === 'gart-foul') {
		mdtg = 'data-toggle="modal" data-target="#grtfoul"';
	} else if (m_id === 'gart-break') {
		mdtg = 'data-toggle="modal" data-target="#grtbreak"';
	}
	this.display_but = '<button id="' + m_id + '" type="button" ' + mdtg + ' class="btn btn-block waves-effect waves-light panbut btn-' + type + '">' + name + '</button>';
	this.setEvent = function(mode, content) {
		$('#' + m_id).show();
		$('#' + m_id).off();
		$('#' + m_id).click(function () {
			if (m_id !== 'gart-score' && m_id !== 'gart-foul' && m_id !== 'gart-break') {
				$('#' + mode).val($('#' + mode).val() + " " + pre + "-" + content);
			}
			if (m_id === 'gart-drop' || m_id === 'gart-score-cs') {
				FULL =  false;
			} else if (m_id !== 'gart-foul' && m_id !== 'gart-break') {
				FULL = true;
			}
			for (var i = 0; i < BUT_ID.length; i++) {
				$('#' + BUT_ID[i]).hide();
			}
		});
	}
}

function ProcCanvas(canvas_id, width, height, but, menu1) {
	var statePointer = new fabric.Circle({
		radius: width * 0.012,
		fill: "yellow",
		left: 100,
		opacity: 0,
		top: 100,
		strokeWidth: width * 0.007,
		stroke: 'rgba(200,200,100,0.5)',
		selectable: false,
		hoverCursor: "pointer",
		originX: 'center',
		originY: 'center',
		evented: false
	});
	var mode = "autonomous";
	var canvas = new fabric.Canvas(canvas_id, {
		selection: false,
		width: width,
		height: height
	});
	fabric.Image.fromURL('./assets/images/arena.png', function (img) {
		img.set({
			scaleX : width / 955,
			scaleY: height / 515
		});
		canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
	});
	canvas.add(statePointer);
	canvas.bringToFront(statePointer);
	
	$('#gart-switch').click(function () {
		if (mode === "autonomous") {
			mode = "teleop";
			$('#gart-switch').html("End match");
			menu1.setHeaderTitle('Teleoperate');
		} else {
			menu1.close();
			$('#end-process').val("true");
			$(".validation-wizard").steps("next");
		}
	});
	
	$('#gart-level-1').click(function () {
		FULL = false;
		$('#' + mode).val($('#' + mode).val() + " s-1-" + POS_ID);
	});
	$('#gart-level-2').click(function () {
		FULL = false;
		$('#' + mode).val($('#' + mode).val() + " s-2-" + POS_ID);
	});
	$('#gart-level-3').click(function () {
		FULL = false;
		$('#' + mode).val($('#' + mode).val() + " s-3-" + POS_ID);
	});

	$('#gart-foul-general').click(function () {
		$('#' + mode).val($('#' + mode).val() + " f-general");
	});
	$('#gart-foul-tech').click(function () {
		$('#' + mode).val($('#' + mode).val() + " f-tech");
	});
	$('#gart-foul-player').click(function () {
		$('#' + mode).val($('#' + mode).val() + " f-player");
	});
	$('#gart-foul-yellow').click(function () {
		$('#' + mode).val($('#' + mode).val() + " f-yellow");
	});
	$('#gart-foul-red').click(function () {
		$('#' + mode).val($('#' + mode).val() + " f-red");
	});
	$('#gart-foul-g04').click(function () {
		$('#' + mode).val($('#' + mode).val() + " f-g04");
	});
	$('#gart-foul-g09').click(function () {
		$('#' + mode).val($('#' + mode).val() + " f-g09");
	});
	$('#gart-foul-g13').click(function () {
		$('#' + mode).val($('#' + mode).val() + " f-g13");
	});
	$('#gart-foul-g16').click(function () {
		$('#' + mode).val($('#' + mode).val() + " f-g16");
	});
	$('#gart-foul-g18').click(function () {
		$('#' + mode).val($('#' + mode).val() + " f-g18");
	});
	
	$('#gart-break-pb').click(function () {
		$('#' + mode).val($('#' + mode).val() + " b-pb");
	});
	$('#gart-break-nm').click(function () {
		$('#' + mode).val($('#' + mode).val() + " b-nm");
	});
	$('#gart-break-lp').click(function () {
		$('#' + mode).val($('#' + mode).val() + " b-lp");
	});
	$('#gart-break-in').click(function () {
		$('#' + mode).val($('#' + mode).val() + " b-in");
	});
	$('#gart-break-na').click(function () {
		$('#' + mode).val($('#' + mode).val() + " b-na");
	});
	$('#gart-break-dn').click(function () {
		$('#' + mode).val($('#' + mode).val() + " b-dn");
	});
	
	canvas.on({
		'mouse:down': function(e) {
			var pointer = canvas.getPointer(e.e);
			statePointer.set({
				opacity: 1,
				left: pointer.x,
				top: pointer.y
			});
			canvas.bringToFront(statePointer);
			canvas.renderAll();
			
			$('#' + mode).val($('#' + mode).val() + " " + "m-" + (pointer.x * 955 / width) + "_" + (pointer.y * 955 / width));
			
			var st = ['gart-foul', 'gart-break'];
			var now = "Hatch platform";
			var tp = 'hp';
			var clr = 'red-';
			if (e.target) {
				POS_ID = e.target.get('id');
				if (FULL) {
					st.push('gart-drop');
					if (POS_ID >= 36 && POS_ID <= 47) {
						st.push('gart-score');
					} else if (POS_ID >= 20 && POS_ID <= 35) {
						st.push('gart-score-cs');
					}
				} else {
					st.push('gart-pk-hatch');
					st.push('gart-pk-cargo');
					if (POS_ID >= 16 && POS_ID <= 19) {
						st.push('gart-load-cargo');
					} else if (POS_ID >= 12 && POS_ID <= 15) {
						st.push('gart-load-cargo');
						st.push('gart-load-hatch');
					}
				}
				
				if (POS_ID >= 12 && POS_ID <= 15) {
					tp = 'ls';
					now = "Loading station";
				} else if (POS_ID >= 16 && POS_ID <= 19) {
					tp = 'dp';
					now = 'Depot';
				} else if (POS_ID >= 20 && POS_ID <= 35) {
					tp = 'cs';
					now = 'Cargo ship';
				} else if (POS_ID >= 36 && POS_ID <= 47) {
					tp = 'rk';
					now = 'Rocket';
				} else {
					st.push('gart-climb');
				}
				$('.jsPanel-ftr').first().html(now);
				if ((POS_ID >= 6 && POS_ID <= 13) ||
					(POS_ID >= 20 && POS_ID <= 27) ||
					(POS_ID >= 36 && POS_ID <= 41) ||
					POS_ID == 16 || POS_ID == 17) {
						clr = 'blue-';
					}
				clr += e.target.get('id');
			} else {
				$('.jsPanel-ftr').first().html("__");
				if (FULL) {
					st.push('gart-drop');
				} else {
					st.push('gart-pk-hatch');
					st.push('gart-pk-cargo');
				}
				tp = "nn";
				clr = "";
			}
			for (var i = 0; i < but.length; i++) {
				if (st.includes(but[i].m_id)) {
					but[i].setEvent(mode, tp + "-" + clr);
				} else {
					$('#' + but[i].m_id).hide();
				}
			}
		},
		'touch:gesture': function(e) {
			var pointer = canvas.getPointer(e.e);
			statePointer.set({
				opacity: 1,
				left: pointer.x,
				top: pointer.y
			});
			canvas.bringToFront(statePointer);
			canvas.renderAll();
		}
	});
	this.update = function() {
		canvas.bringToFront(statePointer);
		canvas.renderAll();
	}
	this.g_add = function(comp_arr) {
		for (var i = 0; i < comp_arr.length; i ++) {
			canvas.add(comp_arr[i].getComp());
		}
	}
}

function createMenu (nw, width, height, but) {
	var result = '<div class="btn-group-vertical btn-block" role="group" aria-label="Vertical button group">';
	for (var i = 0; i < but.length; i++) {
		result += but[i].display_but;
	}
	result += "</div>";
	return jsPanel.create({
		id: "gart-menu",
		headerLogo: "./assets/images/navres.png",
		theme: {
			bgPanel: 'rgb(226, 230, 234, 0.8)',
			bgContent: 'rgb(226, 230, 234, 0.7)',
			colorHeader: '#000',
			colorContent: '#000'
		},
		footerToolbar: '__',
		headerToolbar: '<button id="gart-switch" type="button" class="btn op-g btn-block waves-effect waves-light btn-secondary">Switch to teleop</button>',
		contentSize: {
			width: nw * width,
			height: nw * height
		},
		position: 'center-top 0 250',
		animateIn: 'jsPanelFadeIn',
		headerTitle: 'Autonomous',
		content: result,
		onwindowresize: true,
		onstatuschange: function(panel, status){
			$('.jsPanel-btn-close').first().hide();
			$('.jsPanel-btn-maximize').first().hide();
		}
	});
}

function ProcMap() {
	var info = getInfo();
	var but_l = [new strategyBut('gart-climb', 'primary', 'Start climb', "cl"),
					new strategyBut('gart-drop', 'danger', 'Drop', "d"),
					new strategyBut('gart-score', 'success', 'Score', "s"),
					new strategyBut('gart-score-cs', 'success', 'Score', "ss"),
					new strategyBut('gart-pk-hatch', 'warning', 'Pickup hatch panel', "ph"),
					new strategyBut('gart-pk-cargo', 'info', 'Pickup cargo', "pc"),
					new strategyBut('gart-load-hatch', 'warning', 'Load hatch panel', "lh"),
					new strategyBut('gart-load-cargo', 'info', 'Load cargo', "lc"),
					new strategyBut('gart-foul', 'warning', 'Foul', "f"),
					new strategyBut('gart-break', 'primary', 'Breakdown', "b")];
	var menu1 = createMenu(info.width, 0.25, 0.35, but_l);
	var canvas = new ProcCanvas('process-gart', info.width, info.height, but_l, menu1);
	var dest = [new Procfield(0, info.width, 0.857, 0.172, 0.05, 0.057, 0),
					new Procfield(1, info.width, 0.857, 0.229, 0.05, 0.076, 0),
					new Procfield(2, info.width, 0.857, 0.305, 0.05, 0.057, 0),
					new Procfield(3, info.width, 0.9081, 0.172, 0.072, 0.057, 0),
					new Procfield(4, info.width, 0.9081, 0.305, 0.072, 0.057, 0),
					new Procfield(5, info.width, 0.9081, 0.229, 0.072, 0.076, 0),
					
					new Procfield(6, info.width, 0.083, 0.172, 0.05, 0.057, 0),
					new Procfield(7, info.width, 0.083, 0.229, 0.05, 0.076, 0),
					new Procfield(8, info.width, 0.083, 0.305, 0.05, 0.057, 0),
					new Procfield(9, info.width, 0.01, 0.172, 0.072, 0.057, 0),
					new Procfield(10, info.width, 0.01, 0.305, 0.072, 0.057, 0),
					new Procfield(11, info.width, 0.01, 0.229, 0.072, 0.076, 0),
					
					
					new Procfield(12, info.width, 0, 0.041, 0.052, 0.047, 0),
					new Procfield(13, info.width, 0, 0.445, 0.052, 0.047, 0),
					
					new Procfield(14, info.width, 0.931, 0.041, 0.062, 0.047, 0),
					new Procfield(15, info.width, 0.931, 0.445, 0.062, 0.047, 0),
					
					
					new Procfield(16, info.width, 0.01, 0.134, 0.066, 0.038, 0),
					new Procfield(17, info.width, 0.01, 0.362, 0.066, 0.038, 0),
					
					new Procfield(18, info.width, 0.914, 0.134, 0.066, 0.038, 0),
					new Procfield(19, info.width, 0.914, 0.362, 0.066, 0.038, 0),
					
					
					new Procfield(20, info.width, 0.384, 0.189, 0.03, 0.04, 0),
					new Procfield(21, info.width, 0.417, 0.189, 0.03, 0.04, 0),
					new Procfield(22, info.width, 0.45, 0.189, 0.03, 0.04, 0),
					new Procfield(23, info.width, 0.384, 0.304, 0.03, 0.04, 0),
					new Procfield(24, info.width, 0.417, 0.304, 0.03, 0.04, 0),
					new Procfield(25, info.width, 0.45, 0.304, 0.03, 0.04, 0),
					new Procfield(26, info.width, 0.304, 0.236, 0.04, 0.03, 0),
					new Procfield(27, info.width, 0.304, 0.268, 0.04, 0.03, 0),
					
					new Procfield(28, info.width, 0.575, 0.189, 0.03, 0.04, 0),
					new Procfield(29, info.width, 0.542, 0.189, 0.03, 0.04, 0),
					new Procfield(30, info.width, 0.509, 0.189, 0.03, 0.04, 0),
					new Procfield(31, info.width, 0.575, 0.304, 0.03, 0.04, 0),
					new Procfield(32, info.width, 0.542, 0.304, 0.03, 0.04, 0),
					new Procfield(33, info.width, 0.509, 0.304, 0.03, 0.04, 0),
					new Procfield(34, info.width, 0.647, 0.236, 0.04, 0.03, 0),
					new Procfield(35, info.width, 0.647, 0.268, 0.04, 0.03, 0),
					
					
					new Procfield(36, info.width, 0.333, 0.073, 0.052, 0.034, 150),
					new Procfield(37, info.width, 0.333, 0.073, 0.034, 0.052, 0),
					new Procfield(38, info.width, 0.39, 0.04, 0.052, 0.034, 31),
					new Procfield(39, info.width, 0.315, 0.495, 0.052, 0.034, -150),
					new Procfield(40, info.width, 0.333, 0.408, 0.034, 0.052, 0),
					new Procfield(41, info.width, 0.373, 0.464, 0.052, 0.034, -30),
					
					new Procfield(42, info.width, 0.621, 0.073, 0.052, 0.034, 150),
					new Procfield(43, info.width, 0.621, 0.073, 0.034, 0.052, 0),
					new Procfield(44, info.width, 0.678, 0.04, 0.052, 0.034, 31),
					new Procfield(45, info.width, 0.603, 0.495, 0.052, 0.034, -150),
					new Procfield(46, info.width, 0.621, 0.408, 0.034, 0.052, 0),
					new Procfield(47, info.width, 0.661, 0.464, 0.052, 0.034, -30)];
	if (info.ratio == 1) {
		var pad = (window.innerWidth - 955 - 30 - 1.25 * 50) / 2;
		$('#container-gart-process').css('paddingLeft', pad + "px");
		$('#container-gart-process').css('paddingRight', pad + "px");
	}
	this.ready = function() {
		canvas.g_add(dest);
	}
}

$(document).ready(function() {
	var proMap = new ProcMap();
	proMap.ready();
});
	//****** Mouseover Sibling Fade *******//
	bars.hover(function(e){
					for(var i=0;i<numData;i++){
						if(bars[i].id != e.target.raphael.id)
						{
							bars[i].animate({
								opacity:.5
							},100)
							
							labels[i].animate({
								opacity:.5
							},100)
							
							amounts[i].animate({
								opacity:.5
							},100)
						}
						
							
					}
				
				},function(e){
					bars.animate({
						opacity:1
					},100)
					labels.animate({
						opacity:1
					},100)
					amounts.animate({
						opacity:1
					},100)
				})
	
	
	//****** Moving X-Line *******//
	var xLine = graph.rect(
					xMargin,
					yMargin-5,
					1,
					graphY-(yMargin-5));
					
					xLine.attr({
						width:.3,
						'stroke-width':.5
					});
					
				var xFlag = graph.rect(
					xMargin,
					xLine.attr('y')-30,
					40,
					30);
					
					xFlag.attr({
						fill:'#fff'
					});
					
				var xNum = graph.text(
					xMargin + xFlag.attr('width')/2,
					xFlag.attr('y')+xFlag.attr('height')/2,
					'23');
				
					xNum.attr({
						'font-size':20
					})
					
				
				
				bars.mousemove(function(e){
					xLine.animate({
						x:e.pageX - xOffset
					},50)
					
					xFlag.animate({
						x:e.pageX - xOffset
					},50)
					
					xNum.animate({
						x:(e.pageX - xOffset)+ xFlag.attr('width')/2
					},50)
				});
				
				$(graphBg.node).mousemove(function(e){
					xLine.animate({
						x:e.pageX - xOffset
					},50)
					
					xFlag.animate({
						x:e.pageX - xOffset
					},50)
					
					xNum.animate({
						x:(e.pageX - xOffset)+ xFlag.attr('width')/2
					},50)
	
				})
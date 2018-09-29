var keyword = [];
$(document).ready(function(){
	map_init();
});
function map_init(){
	var map = new BMap.Map('map'),
		point = new BMap.Point(121.461386,31.254694),
		localSearch = new BMap.LocalSearch(map);
	//地图的控件
	map.addControl(new BMap.NavigationControl());
	map.addControl(new BMap.ScaleControl());
	map.addControl(new BMap.OverviewMapControl());
	map.addControl(new BMap.MapTypeControl());
	for(var i=0; i<keyword.length;i++){
		localSearch.search(keyword[i].address);
	};
	localSearch.setSearchCompleteCallback(function(searchResult){
		if(searchResult.keyword == "null"){
			return ;
		}
		var poi = searchResult.getPoi(0);
		point = poi.point;
		map.centerAndZoom(point,10);
		var marker = new BMap.Marker(point,{offset: new BMap.Size(3,20)}),
			InfoWindow = new BMap.InfoWindow("地址："+ searchResult.keyword,{width: 220,height: 70,title: getTitle(searchResult.keyword)});
		map.addOverlay(marker);
		marker.openInfoWindow(InfoWindow,map.getCenter());
		marker.addEventListener("mouseover",function(){
			marker.openInfoWindow(InfoWindow,map.getCenter());
		});
		marker.addEventListener("click",function(){
			marker.openInfoWindow(InfoWindow,map.getCenter());
		});
	});
	//鼠标滚动事件
	$('#map').mousewheel(function(e){
		if(e.deltaY > 0){
			map.zoomTo(map.getZoom() + 1);
		}else{
			map.zoomTo(map.getZoom() - 1);
		}
		return false;
	});

}
function getTitle(value){
	for(var i=0; i<keyword.length; i++){
		if(keyword[i].address == value){
			return keyword[i].title;
		}
	}
}
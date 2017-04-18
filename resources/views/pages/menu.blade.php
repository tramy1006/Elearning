<div>
	<ul class="list-group" id="menu">
	    <li href="#" class="list-group-item menu1 active">
	        Menu
	    </li>
	     @foreach($cate as $category)
	        <li href="#" class="list-group-item menu1">
	        <a href="/cate/{{$category->id}}">{{$category->name}}</a>
	           

	        </li>
	    @endforeach
	                    
	</ul>
</div>



<nav id="menu" class="navbar">
    <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
    <div class="container">
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
          <li><a class="home_link" title="خانه" href="{{route('client.home')}}">خانه</a></li>

            @foreach ($categories as $category)
                <li class="dropdown"><a href="#">{{$category->title}}</a>
                    @if ($category->childrens()->count() > 0)
                        <div class="dropdown-menu">
                        <ul>
                            @foreach ($category->childrens as $item)
                                <li>
                                    <a href="category.html">{{$item->title}}
                                        @if ($item->childrens()->count() > 0)
                                        <span>&rsaquo;</span>
                                        @endif
                                    </a>
                                    @if ($item->childrens()->count() > 0)
                                        <div class="dropdown-menu">
                                            <ul>
                                                @foreach ($item->childrens as $subcategory)
                                                    <li><a href="#">{{$subcategory->title}} </a> </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    @endif
                                </li>
                               @endforeach
                            </ul>
                        </div>
                    @endif
                </li>
            @endforeach
      </ul>
    </div>
    </div>
  </nav>



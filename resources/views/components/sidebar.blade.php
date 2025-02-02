<div class="w-64 flex-none bg-blue-500 text-white p-4 space-y-2">
    <div>
        <a href="/mydashboard" 
           class="block py-2 px-2 rounded hover:bg-blue-600 
                  {{ Request::is('mydashboard') ? 'bg-blue-700' : '' }}" 
           aria-current="{{ Request::is('mydashboard') ? 'page' : '' }}">
            My Dashboard
        </a>
    </div>
    <div>
        <a href="/mydashboard/posts" 
           class="block py-2 px-2 rounded hover:bg-blue-600 
                  {{ Request::is('mydashboard/posts*') ? 'bg-blue-700' : '' }}" 
           aria-current="{{ Request::is('mydashboard/posts*') ? 'page' : '' }}">
            Post
        </a>
    </div>
</div>

<div class="p-4 p-md-5 mb-4 text-white min-vh-100 d-flex align-items-center rounded bg-showcase">
    <div class="col-md-8 px-0">
        <h1 class="display-4 font-italic">Ready to get something awesome?</h1>
        <p class="lead my-3">Practical screencasts for awesome developers..</p>
        <form action="{{route('welcome.index')}}" method="GET">
            <div class="input-group input-group-lg mb-3">
                <input name="search" type="text" value="{{request()->query('search')}}" class="form-control py-4" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="What would you like to search? e.g. Helfer, Amazon">
            </div>
        </form>
        <p class="lead mb-0">Or Just <a href="{{route('jobs')}}" class="text-blue-500 fw-bold">Browse the jobs</a></p>
    </div>
</div>

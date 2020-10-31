@extends('dashboard.dashboard')

@section('content')
<div class="db-card-header db-card-header-green">
	<div class="container">
		<div class="header-title">
			Stocks
		</div>
		<div class="header-subtitle">
			Are your Messy products still in stock?
		</div>
		<div class="header-action">
			<a href="#settings" class="btn header-btn">
				Go to settings
			</a>
		</div>
		<div class="header-image">
		</div>
	</div>
</div>
<div class="db-content">
	<div class="container">
		<table class="table-fixed">
		  <thead>
		    <tr>
		      <th class="w-1/2 px-4 py-2">Title</th>
		      <th class="w-1/4 px-4 py-2">Author</th>
		      <th class="w-1/4 px-4 py-2">Views</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td class="border px-4 py-2">Intro to CSS</td>
		      <td class="border px-4 py-2">Adam</td>
		      <td class="border px-4 py-2">858</td>
		    </tr>
		    <tr class="bg-gray-100">
		      <td class="border px-4 py-2">A Long and Winding Tour of the History of UI Frameworks and Tools and the Impact on Design</td>
		      <td class="border px-4 py-2">Adam</td>
		      <td class="border px-4 py-2">112</td>
		    </tr>
		    <tr>
		      <td class="border px-4 py-2">Intro to JavaScript</td>
		      <td class="border px-4 py-2">Chris</td>
		      <td class="border px-4 py-2">1,280</td>
		    </tr>
		  </tbody>
		</table>
	</div>
</div>
@endsection

{{-- <p>rsgof</p> --}}
{{-- <div class="card">
    
        <tbody id="search_list">
            @foreach($driver as $key=>$all_driver)
            <tr>
                <td>{{ ($driver->currentpage()-1) * $driver->perpage() + $key + 1 }}</td>
                <td>{{ $all_driver->first_name}}</td>
                <td>{{ $all_driver->last_name}}</td>
                <td>{{ $all_driver->email}}</td>
                <td>{{ $all_driver->phone_number}}</td>
                <td>{{ $all_driver->category_id}}</td>
                <td>
                    @if ($all_driver->is_available == 1)
                    <span style="color:green;">Available</span>
                @else
                    <span style="color:red;">UnAvailable</span>
                @endif
                </td>
                <td><a href="" class="btn btn-info"><i class="fas fa-eye"></i></a>
                   <a href="" class="btn btn-success"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    
</div>
         --}}
   


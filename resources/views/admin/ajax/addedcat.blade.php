<tr>
    <th style="width: 40px;">{{ $cat->id }}</th>
    <td>{{ $cat->name }}</td>
    <td><a href="#" class="btn btn-success edit">Edit</a></td>
    <td><a href="{{ route('admin.cats.delete', ['id' => $cat->id]) }}" class="btn btn-danger delete">Delete</a></td>
</tr>

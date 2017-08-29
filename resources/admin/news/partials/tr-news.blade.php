<tr class="">
    <td class="center"><input type="checkbox" name="row_del" id="row_del" data-id="{{ $item->id }}"></td>
    <td class="center">{{ $item->id }}</td>
    <td class="center" style="width: 20%">{{ $item->title }}</td>
    <td class="center" style="width: 10%">{{ $item->ca_title }}</td>
    <td class="center">
        @if($item->lock == 1)
        <a href="#" data-id="{{ $item->id }}" data-lock='0' onclick=""><span class="glyphicon glyphicon-remove red" aria-hidden="true"></span></a>
        @else
        <a href="#" data-id="{{ $item->id }}" data-lock='1' onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
        @endif
    </td>
    <td class="center">
        <span>{{ $item->first_name .' '.$item->last_name }}</spam><br>
        <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
    </td>
    <td class="center">{{ format_date($item->created_at, 'H:i d-m-Y') }}</td>
    <td class="center">
        <a href="{{ route('news.edit', $item->id) }}"><button class="btn btn-xs mar-r-5"><i class="glyphicon glyphicon-pencil"></i>Edit</button></a>
        <button class="btn btn-xs btn-danger" data-id="{{ $item->id }}" onclick="confirmDel(this)"><i class="glyphicon glyphicon-trash"></i>Del</button>
    </td>
</tr>
<table>
    <thead>
    <tr>
        <th>کد های شما : </th>
    </tr>
    </thead>
    <tbody>
    @foreach($codes as $code)
        <tr>
            <td>{{ $code->code}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

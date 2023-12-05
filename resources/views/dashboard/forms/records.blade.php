<tr>
    <td class="text-center">{{ date('Y-m-d H:i:s', strtotime($val->dated)) }}</td>
{{--    <td class="text-center">#{{ $val->rec_id }}</td>--}}
    <td class="text-center">
        <div class="tabel-coin-wrap">
            <span>
                <img src="{{$val->coin_img}}" width="40" alt="">
            </span>
            <p>{{ $val->asset_name }} <span>{{  $val->asset_code}}</span></p>
        </div>

    </td>
    <td class="text-center"><button class="btn {{ $val->trade === 'sell' ? 'btn-danger' : 'faded-success' }} text-white">{{ strtoupper($val->trade) }}</button></td>
    <td class="text-center">
        <i>
            <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.3878 6.9217C10.3878 6.57863 10.1098 6.30054 9.76669 6.30054H3.36872C3.02565 6.30054 2.74756 6.57863 2.74756 6.9217C2.74756 7.26477 3.02565 7.54286 3.36872 7.54286H9.76669C10.1098 7.54286 10.3878 7.26477 10.3878 6.9217Z" fill="#1D1D1D"></path>
                <path d="M3.36872 8.78516C3.02565 8.78516 2.74756 9.06325 2.74756 9.40632C2.74756 9.74938 3.02565 10.0275 3.36872 10.0275H7.25441C7.59748 10.0275 7.87557 9.74938 7.87557 9.40632C7.87557 9.06325 7.59748 8.78516 7.25441 8.78516H3.36872Z" fill="#1D1D1D"></path>
                <path d="M3.15567 11.2697C2.93027 11.2697 2.74756 11.5477 2.74756 11.8908C2.74756 12.2339 2.93027 12.512 3.15567 12.512H5.70862C5.93402 12.512 6.11673 12.2339 6.11673 11.8908C6.11673 11.5477 5.93402 11.2697 5.70862 11.2697H3.15567Z" fill="#1D1D1D"></path>
                <path d="M10.0187 14.7483H2.75051C2.0655 14.7483 1.50819 14.191 1.50819 13.5059V2.57351C1.50819 1.88849 2.0655 1.33119 2.75051 1.33119H10.3873C11.0724 1.33119 11.6297 1.88849 11.6297 2.57351V13.4022C11.6297 13.7453 11.9078 14.0234 12.2508 14.0234C12.5939 14.0234 12.872 13.7453 12.872 13.4022V2.57351C12.872 1.20348 11.7574 0.0888672 10.3873 0.0888672H2.75051C1.38048 0.0888672 0.265869 1.20348 0.265869 2.57351V13.5059C0.265869 14.876 1.38048 15.9906 2.75051 15.9906H10.0187C10.3618 15.9906 10.6399 15.7125 10.6399 15.3694C10.6399 15.0264 10.3618 14.7483 10.0187 14.7483Z" fill="#1D1D1D"></path>
                <path d="M9.76669 3.81592H3.36872C3.02565 3.81592 2.74756 4.09401 2.74756 4.43708C2.74756 4.78015 3.02565 5.05824 3.36872 5.05824H9.76669C10.1098 5.05824 10.3878 4.78015 10.3878 4.43708C10.3878 4.09401 10.1098 3.81592 9.76669 3.81592Z" fill="#1D1D1D"></path>
            </svg>
        </i>
        {{ $val->buy_price }}$
    </td>
    <td class="text-center">
        <i>
            <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.3878 6.9217C10.3878 6.57863 10.1098 6.30054 9.76669 6.30054H3.36872C3.02565 6.30054 2.74756 6.57863 2.74756 6.9217C2.74756 7.26477 3.02565 7.54286 3.36872 7.54286H9.76669C10.1098 7.54286 10.3878 7.26477 10.3878 6.9217Z" fill="#1D1D1D"></path>
                <path d="M3.36872 8.78516C3.02565 8.78516 2.74756 9.06325 2.74756 9.40632C2.74756 9.74938 3.02565 10.0275 3.36872 10.0275H7.25441C7.59748 10.0275 7.87557 9.74938 7.87557 9.40632C7.87557 9.06325 7.59748 8.78516 7.25441 8.78516H3.36872Z" fill="#1D1D1D"></path>
                <path d="M3.15567 11.2697C2.93027 11.2697 2.74756 11.5477 2.74756 11.8908C2.74756 12.2339 2.93027 12.512 3.15567 12.512H5.70862C5.93402 12.512 6.11673 12.2339 6.11673 11.8908C6.11673 11.5477 5.93402 11.2697 5.70862 11.2697H3.15567Z" fill="#1D1D1D"></path>
                <path d="M10.0187 14.7483H2.75051C2.0655 14.7483 1.50819 14.191 1.50819 13.5059V2.57351C1.50819 1.88849 2.0655 1.33119 2.75051 1.33119H10.3873C11.0724 1.33119 11.6297 1.88849 11.6297 2.57351V13.4022C11.6297 13.7453 11.9078 14.0234 12.2508 14.0234C12.5939 14.0234 12.872 13.7453 12.872 13.4022V2.57351C12.872 1.20348 11.7574 0.0888672 10.3873 0.0888672H2.75051C1.38048 0.0888672 0.265869 1.20348 0.265869 2.57351V13.5059C0.265869 14.876 1.38048 15.9906 2.75051 15.9906H10.0187C10.3618 15.9906 10.6399 15.7125 10.6399 15.3694C10.6399 15.0264 10.3618 14.7483 10.0187 14.7483Z" fill="#1D1D1D"></path>
                <path d="M9.76669 3.81592H3.36872C3.02565 3.81592 2.74756 4.09401 2.74756 4.43708C2.74756 4.78015 3.02565 5.05824 3.36872 5.05824H9.76669C10.1098 5.05824 10.3878 4.78015 10.3878 4.43708C10.3878 4.09401 10.1098 3.81592 9.76669 3.81592Z" fill="#1D1D1D"></path>
            </svg>
        </i>
        {{ $val->take_of_it }}$
    </td>
    <td class="text-center">
        <i>
            <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.3878 6.9217C10.3878 6.57863 10.1098 6.30054 9.76669 6.30054H3.36872C3.02565 6.30054 2.74756 6.57863 2.74756 6.9217C2.74756 7.26477 3.02565 7.54286 3.36872 7.54286H9.76669C10.1098 7.54286 10.3878 7.26477 10.3878 6.9217Z" fill="#1D1D1D"></path>
                <path d="M3.36872 8.78516C3.02565 8.78516 2.74756 9.06325 2.74756 9.40632C2.74756 9.74938 3.02565 10.0275 3.36872 10.0275H7.25441C7.59748 10.0275 7.87557 9.74938 7.87557 9.40632C7.87557 9.06325 7.59748 8.78516 7.25441 8.78516H3.36872Z" fill="#1D1D1D"></path>
                <path d="M3.15567 11.2697C2.93027 11.2697 2.74756 11.5477 2.74756 11.8908C2.74756 12.2339 2.93027 12.512 3.15567 12.512H5.70862C5.93402 12.512 6.11673 12.2339 6.11673 11.8908C6.11673 11.5477 5.93402 11.2697 5.70862 11.2697H3.15567Z" fill="#1D1D1D"></path>
                <path d="M10.0187 14.7483H2.75051C2.0655 14.7483 1.50819 14.191 1.50819 13.5059V2.57351C1.50819 1.88849 2.0655 1.33119 2.75051 1.33119H10.3873C11.0724 1.33119 11.6297 1.88849 11.6297 2.57351V13.4022C11.6297 13.7453 11.9078 14.0234 12.2508 14.0234C12.5939 14.0234 12.872 13.7453 12.872 13.4022V2.57351C12.872 1.20348 11.7574 0.0888672 10.3873 0.0888672H2.75051C1.38048 0.0888672 0.265869 1.20348 0.265869 2.57351V13.5059C0.265869 14.876 1.38048 15.9906 2.75051 15.9906H10.0187C10.3618 15.9906 10.6399 15.7125 10.6399 15.3694C10.6399 15.0264 10.3618 14.7483 10.0187 14.7483Z" fill="#1D1D1D"></path>
                <path d="M9.76669 3.81592H3.36872C3.02565 3.81592 2.74756 4.09401 2.74756 4.43708C2.74756 4.78015 3.02565 5.05824 3.36872 5.05824H9.76669C10.1098 5.05824 10.3878 4.78015 10.3878 4.43708C10.3878 4.09401 10.1098 3.81592 9.76669 3.81592Z" fill="#1D1D1D"></path>
            </svg>
        </i>
        {{ $val->stop_loss }}$
    </td>
{{--    <td class="text-center">--}}
{{--        <a href="javascript:;" class="btn {{ $val->coin_status  === 'win' ? 'super-faded-success text-success' : 'super-faded-loss text-danger' }} ">{{ strtoupper($val->coin_status) }}</a>--}}
{{--    </td>--}}

    @if ($user->isAdmin())
        <td class="text-center">
            <a href="{{route('edit-record', ['id' => $val->id])}}"><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal" title="Edit Record"></i></a>
        </td>
        <td>
            <a href="{{route('delete-record',['id'=> $val->id])}}" >
                <i class="fas fa-trash" data-toggle="modal" data-target="#exampleModal" title="Delete Record"></i>
            </a>
        </td>
    @endif
</tr>
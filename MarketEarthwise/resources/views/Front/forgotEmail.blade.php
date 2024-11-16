Hello {{ $name }}<br />
<div class="account_form" data-aos="fade-up" data-aos-delay="0"
    style="border: 1px solid #000;width:50%;margin-left:200px;padding:50px;">

    <div style="text-align: center; ">
        <a href="{{ url('/forgot-password-change/') }}/{{ $rand_id }}"
            style="background-color: #000000;color: white;padding:5px;text-decoration:none;height:500px;width:200px;"
            class="btn btn-primary">Click
            here</a><br> to change your
        password
    </div>
</div>

<style>
    /* Estilo de Flotantes */
    .topcontrol {
        position: fixed;
        bottom: 5px;
        right: 5px;
        opacity: 0.8;
        cursor: pointer;
        z-index: 100;
        background: #333333;
        width: 50px;
        height: 50px;
        /* border-radius: 50%; */
        padding-top: 6px;
        padding-left: 13px;
        border: 2px solid white;
        color: white;
    }

    .topcontrol:hover {
        color: white;
    }

    .topcontrol2 {
        position: fixed;
        bottom: -300px;
        right: 18px;
        opacity: 0.8;
        cursor: pointer;
        z-index: 100;
        background: #00D553;
        width: 50px;
        height: 50px;
        padding-top: 4px;
        padding-left: 8px;
        /* border: 2px solid white; */
        border-radius: 50%;
        transition: all 3 ease-in-out;
    }

    .topcontrol2:hover {
        transform: scale(1.08);
    }

    .topcontrol2 i {
        color: white;
        margin-top: 5px;
        margin-left: 5px;
        font-size: 2rem;
    }

    .topcontrol3 {
        position: fixed;
        bottom: 112px;
        right: 18px;
        opacity: 0.8;
        cursor: pointer;
        z-index: 100;
        background-color: rgb(31, 202, 216, 1);
        width: 50px;
        height: 50px;
        padding-top: 4px;
        padding-left: 8px;
        /* border: 2px solid white; */
        border-radius: 50%;
        transition: all 3 ease-in-out;
    }

    .topcontrol3 img {
        height: 32px;
        width: 30px;
        margin-top: 5px;
        margin-left: 2px;
    }

    .topcontrol3:hover {
        transform: scale(1.08);
    }

    .topcontrol4 {
        position: fixed;
        bottom: 50px;
        right: 95%;
        opacity: 0.8;
        cursor: pointer;
        z-index: 100;
        background-color: #000;
        width: 50px;
        height: 50px;
        padding-top: 4px;
        padding-left: 8px;
        /* border: 2px solid white; */
        border-radius: 50%;
        transition: all 3 ease-in-out;
    }

    .topcontrol4 img {
        height: 32px;
        width: 30px;
        margin-top: 5px;
        margin-left: 2px;
    }

    .topcontrol4:hover {
        transform: scale(1.08);
    }

    .topcontrol5 {
        position: fixed;
        bottom: 112px;
        right: 95%;
        opacity: 0.8;
        cursor: pointer;
        z-index: 100;
        background-color: rgb(255, 255, 255, 1);
        width: 50px;
        height: 50px;
        padding-top: 4px;
        padding-left: 8px;
        /* border: 2px solid white; */
        border-radius: 50%;
        transition: all 3 ease-in-out;
    }

    .topcontrol5 img {
        height: 28px;
        width: 32px;
        margin-top: 7px;
        margin-left: 2px;
    }

    .topcontrol5:hover {
        transform: scale(1.08);
    }

    .topcontrol6 {
        position: fixed;
        bottom: 176px;
        right: 95%;
        opacity: 0.8;
        cursor: pointer;
        z-index: 100;
        background-color: #f22224;
        width: 50px;
        height: 50px;
        padding-top: 4px;
        padding-left: 8px;
        /* border: 2px solid white; */
        border-radius: 50%;
        transition: all 3 ease-in-out;
    }

    .topcontrol6 img {
        height: 26px;
        width: 33px;
        margin-top: 8px;
        margin-left: 1px;
    }

    .topcontrol6:hover {
        transform: scale(1.08);
    }

    .topcontrol7 {
        position: fixed;
        bottom: 236px;
        right: 95%;
        opacity: 0.8;
        cursor: pointer;
        z-index: 100;
        background-color: #3b5998;
        width: 50px;
        height: 50px;
        padding-top: 4px;
        padding-left: 8px;
        /* border: 2px solid white; */
        border-radius: 50%;
        transition: all 3 ease-in-out;
    }

    .topcontrol7 img {
        height: 33px;
        width: 23px;
        margin-top: 5px;
        margin-left: 5px;
    }

    .topcontrol7:hover {
        transform: scale(1.08);
    }

    /* Estilo de plus en redes */
    #btn-mas {
        display: none;
    }

    .contain {
        position: fixed;
        bottom: -233px;
        right: 16px;
        z-index: 10;
    }

    .redes a,
    .btn-mas label {
        display: block;
        text-decoration: none;

        color: #fff;
        width: 55px;
        height: 55px;
        line-height: 55px;
        text-align: center;
        border-radius: 50%;
        box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.4);
        transition: all 500ms ease;
        z-index: 100;

    }

    .redes a:hover {
        background: #fff;
        color: var(--color2);
    }

    .redes a {
        margin-bottom: -15px;
        opacity: 0;
        visibility: hidden;
    }

    #btn-mas:checked~.redes a {
        margin-bottom: 10px;
        opacity: 1;
        visibility: visible;
    }

    .btn-mas label {
        cursor: pointer;
        background: var(--color2);
        font-size: 23px;
    }

    #btn-mas:checked~.btn-mas label {
        transform: rotate(135deg);
        font-size: 25px;
    }

    


  /*   @media only screen and (max-width: 450px) {


        .topcontrol4,
        .topcontrol4,
        .topcontrol5,
        .topcontrol6,
        .topcontrol7 {
            display: none;
        }

        .contain {
            display: block;
        }
    } */
</style>

<section id="redes">
    <div class="topcontrol2">
        <a href="https://api.whatsapp.com/send/?phone=51903445266&text&type=phone_number&app_absent=0" target="_blank">
            <span>
                <i class="fab fa-whatsapp fa-2x"></i>
            </span>
        </a>
    </div>
    <div class="contain">
        <input type="checkbox" id="btn-mas">
        <div class="redes">
            <a href="https://www.facebook.com/tupperwareperuoficial" style=" background: #3b5998;" class="fa fa-facebook" target="_blank"></a>
            <a href="https://www.instagram.com/tupperware.peruoficial/" style="background-image: linear-gradient(to left top, #3315a1, #6e0095, #900088, #aa007a, #bc006d, #cb1563, #d82959, #e13c4f, #eb5547, #f16d3f, #f4853a, #f59c38);" class="fa fa-instagram" target="_blank"></a>
            <a href="https://www.youtube.com/channel/UCfrwyZQC9MvHb_s5vBDGxUQ" style=" background: #f22224;" class="fa fa-youtube" target="_blank"></a>
           <!--  <a href="#" class="fa fa-twitter" style=" background: #00acee;" target="_blank"></a> -->
            <a href="https://www.tiktok.com/@tupperware_peruoficial" class="fab fa-tiktok" style=" background: black;" target="_blank"></a>
        </div>
        <div class="btn-mas">
            <label for="btn-mas" class="fa fa-plus"></label>
        </div>
    </div>
</section>
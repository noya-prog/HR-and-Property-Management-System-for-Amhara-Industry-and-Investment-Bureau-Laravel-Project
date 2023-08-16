@extends('frontend.master')
@section('title', 'Home Page')
@section('content')
    <div class="bread-wrapper bg-light">
        <div aria-label="breadcrumb">
            <h3 class="text-center">{{ $pageTitle }}</h3>
            <ol class="breadcrumb justify-content-center  bg-light">

            </ol>
        </div>
    </div>
    <div class="bigslider mt-2">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <img class="image" src="{{ asset('assets/img/h1.jpg') }}" alt="">
                </div>
                <div class="swiper-slide"> <img src="{{ asset('assets/img/h7.jpg') }}" alt=""> </div>
                <div class="swiper-slide"> <img src="{{ asset('assets/img/21.jpg') }}" alt=""></div>

            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>

    <div class="ml-5 mt-5">
        <div class="row">
            <div class="col-md-6 ">
                <h3>Mr Melaku Tessema</h3>
                <p class="text-justify">የአስፈጻሚውን አካል ስልጣንና ተግባር ለመወሰን በአዋጅ ቁጥር 916/2008 መሠረት ለገንዘብ ሚኒስቴር ከተሰጡት ተግባራትና ኃላፊነቶች
                    መካከል አንዱ የውጭ ሀብትን ማሰባሰብ እና ማስተዳደር ነው ፡፡ የውጭ ሀብትን ማግኘትን እና ማስተዳደርን የሚቆጣጠረው የኢኮኖሚ ትብብር ዘርፍ በሚኒስትር ዴኤታው እና
                    በስድስት ዳይሬክቶሬቶች የተደራጀ ነው፡፡

                    በዘርፉ ካሉት ቁልፍ ተግባራት መካከል የአገሪቱን የአጭርና የመካከለኛ ልማት ተግባራዊ ለማድረግ ከዓለም አቀፍ የገንዘብ ተቋማት፣ከአውሮፓ ህብረት፣ከተባበሩት መንግስታት
                    እና ከአየር ንብረት ለውጥ እና ከ 20 በላይ የልማት አጋሮች ጋር ኢኮኖሚያዊ ትብብር መመስረት እና ማጠናከር ነው ፡፡ፕሮግራሞች. (ፋይናንስ እና ቴክኒካዊ ድጋፍ)
                    የመንግስትን የበጀት አያያዝ እና የግዥ ስርዓት መሰብሰብ እና ተግባራዊ ማድረግ ፣ በፕሮግራም ስምምነቶች መሠረት የተገኙ ሀብቶች አጠቃቀምን መከታተል ፣ ከአለም አቀፍ
                    የብድር ደረጃ አሰጣጥ ኤጀንሲዎች እና ተቋማት ባለሀብቶች ጋር ያለውን ግንኙነት በማስተባበር እና በደቡብ-ደቡብ ካሉ ታዳጊ ሀገሮች ጋር መተባበር፡፡ትብብርን ማጠናከር
                    እና ኢኮኖሚያዊ ተጠቃሚነትን ማረጋገጥ እንዲሁም ጤናማ የብድር አያያዝን ማረጋገጥ እና በዚህ ረገድ ግልፅነትና ተጠያቂነትን ማረጋገጥ ፡፡

                    በተጨማሪም ከዘርፉ የበለጠ የመዋዕለንዋይ ፍስትን ለመሳብ የመንግስትና የግል ሽርክና ለመመስረት የፖሊሲው እና የህግ ማዕቀፉ የተጠናቀቀ ሲሆን የአደረጃጀትና የፕሮጀክት
                    መረጣ ተግባራትም በመካሄድ ላይ ናቸው ፡፡

                    ፕሮጀክቶችን መደገፍ እና መቆጣጠር አፈፃፀምን የበለጠ በማሻሻል ፣ ተነሳሽነታችን በማሳደግ እና በቅርበት ለህዝባችን ዘላቂ ኢኮኖሚያዊ እና ማህበራዊ ልማት በማምጣት
                    ለእድገትና ትራንስፎርሜሽን እቅድ (GTP) እና ለተባበሩት መንግስታት የዘላቂ ልማት ግቦች ከፍተኛ አስተዋጽኦ ማድረጋችንን እንቀጥላለን፡፡</p>

                <div class="row  justify-content-between">
                    <div class="col-md-3 mt-5">
                        <button class="btn btn-lg btn-primary">More</button>
                    </div>
                    {{-- <div class="col-md-3 mt-5">
                        <span class="fa-2x text-primary mr-2 hover-effect"><a href=""><i
                                    class="fa-brands fa-twitter"></i></a></span>
                        <span class="fa-2x text-primary mr-2 hover-effect"><a href=""><i
                                    class="fa-brands fa-facebook"></i></a></span>
                        <span class="fa-2x text-danger mr-2 hover-effect"><a href=""><i
                                    class="fa-brands fa-instagram"></i></a></span>

                    </div> --}}
                </div>
            </div>
            <div class="col-md-4 m-3">
                <div class="image-wrapper">
                    <img src="{{ asset('assets/img/man-1.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-center mt-5">News</h3>
    <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card">
                    <div class="img-wrapper"><img src="{{ asset('assets/img/n1.jpg') }}" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="card-body">
                        <p class="card-text">በሲቪል ሰርቪስ ኮሚሽን እና በሰላም ሚኒስቴር አስተባባሪነት ብሔራዊ የመስግስት አገልግሎት ዘርፍ ተኮር የምክክር መድረክ</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="{{ asset('assets/img/n2.jpg') }}" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="card-body">

                        <p class="card-text">የአማራ ኢንዱስትሪ ሰራተኞች የተጠሪ ተቋማት ሰራተኞች በክልሉ የአረንጓዴ አሻራቸውን ሲያኖሩ እና የአቅመ
                            ደካሞችን ቤት የማደስ ተግባር ሲሳተፉ</p>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="{{ asset('assets/img/n3.jpg') }}" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="card-body">

                        <p class="card-text">ለሁለት አዲስ ሀገር አቀፍ የቴሌኮሙኒኬሽን ፍቃዶች የጨረታ ማስረከቢያ ጊዜ የመዘጋት ስነ ስርዓት</p>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="{{ asset('assets/img/n4.jpg') }}" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="card-body">

                        <p class="card-text">የኢትዮ-ቻይና 4ኛ ከፍተኛ ደረጃ የማስተባበርና የምክክር መድረክ በባቡር ፕሮጀክቶች ላይ</p>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="{{ asset('assets/img/n5.jpg') }}" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="card-body">

                        <p class="card-text">ኢትዮጵያ የመንግስትን ዲጂታላይዜሽን ፕሮግራም ለመደገፍ ከአጋር ድርጅቶች ጋር የብድር ስምምነት ተፈራረመች</p>

                    </div>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="" aria-hidden="true"></span>
            <span class="visually-hidden"><i class="fa-sharp fa-solid fa-angles-left"></i></span>
        </button>
        <button class="carousel-control-next bg-dark" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="" aria-hidden="true"></span>
            <span class="visually-hidden"><i class="fa-sharp fa-solid fa-angles-right"></i></span>
        </button>
    </div>
@endsection

@extends('frontend.master')
@section('title', 'About Us Page')
@section('content')

    <div class="bread-wrapper bg-light">
        <div aria-label="breadcrumb">
            <h3 class="text-center">{{ $pageTitle }}</h3>
            <ol class="breadcrumb justify-content-center  bg-light">
                <li class="breadcrumb-item "><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
            </ol>
        </div>
    </div>

    <main>

        <div class="container about">
            <h3 class="text-center mb-3">Our Mission Vision & Values</h3>
            <div class="row d-flex justify-content-between m-5">
                <div class="col-md-3 ">
                    <div class="image-wrapper mb-4 m-auto ">
                        <img src="{{ asset('assets/img/mission.svg') }}" alt="">
                    </div>
                    <div class="content text-center mt-4 ">
                        <h4 class="">ተልእኮ</h4>
                        <p>በአማራ ኢንቨስትመንት ቢሮ ያለን ተልእኮ ቀጣይነት ያለው የኢኮኖሚ እድገትን በማስተዋወቅ የሀገር ውስጥና የውጭ ኢንቨስትመንቶችን ወደ አማራ ክልል በመሳብ
                            ለባለሃብቶች ሁለንተናዊ ድጋፍና የማመቻቸት አገልግሎት በመስጠት፣ ፈጠራን በማጎልበት እና የንግድ ስራን በማረጋገጥ ምቹ የንግድ ሁኔታ ለመፍጠር እንተጋለን
                            በክልሉ ውስጥ የሁሉም ዘርፎች ፍትሃዊ እድገት</p>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="image-wrapper mb-4 m-auto ">
                        <img src="{{ asset('assets/img/vision.svg') }}" alt="">
                    </div>
                    <div class="content text-center mt-4">
                        <h4 class="">ራእይ</h4>
                        <p>ራዕያችን የአማራ ክልልን በኢትዮጵያ ቀዳሚ የኢንቨስትመንት ማዕከል አድርጎ፣ በተለዋዋጭ የንግድ ምኅዳሩ፣ በዘላቂ ኢኮኖሚ ዕድገቱ እና በአካታች ልማቱ
                            የሚታወቅ ነው። ፈጠራን የሚያንቀሳቅሱ፣ የስራ እድል የሚፈጥሩ እና የክልሉን ህዝቦች የኑሮ ጥራት የሚያሻሽሉ የተለያዩ ኢንቨስትመንቶችን ለመሳብ እንተጋለን
                            ።</p>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="image-wrapper mb-4 m-auto">
                        <img src="{{ asset('assets/img/value.svg') }}" alt="">
                    </div>
                    <div class="content text-center mt-4">
                        <h4 class="">Values</h4>
                        <p>በኩባንያችን የላቀ ጥራትን፣ ታማኝነትን፣ የደንበኞችን ማዕከልነት፣ ትብብርን፣ ፈጠራን እና ማህበራዊ እና አካባቢያዊ ሃላፊነትን እናደንቃለን። ለልህቀት
                            እንተጋለን፣ ከፍተኛ የስነምግባር ደረጃዎችን እናከብራለን፣ ለደንበኞቻችን ፍላጎት ቅድሚያ እንሰጣለን፣ የቡድን ስራን እናበረታታለን፣ ፈጠራን እንቀበላለን፣
                            እና ለህብረተሰብ እና ለአካባቢው በኃላፊነት እንሰራለን። እነዚህ እሴቶች ተግባሮቻችንን ይመራሉ፣ ባህላችንን ይቀርፃሉ እና ስኬታችንን ያንቀሳቅሳሉ።</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="messages">

            <h3 class="text-center">Message Of Officials</h3>
            <hr>
            <div class="row d-flex justify-content-around m-5  align-items-center">

                <div class="card zoom-effect col-md-4">
                    <img src="{{ asset('assets/img/ey.jpg') }}" class="card-img-top " alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">ክቡር ዶ/ር እዮብ ተካልኝ</h5>

                    </div>
                </div>
                <div class="card zoom-effect col-md-4">
                    <img src="{{ asset('assets/img/fem.jpg') }}" class="card-img-top " alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">ክብርት ወ/ሮ ሰመሪታ ሰዋሰው የገንዘብ የኢኮኖሚ ትብብር ሚኒሴቴር</h5>

                    </div>
                </div>

            </div>

            <div class="row text-center d-flex justify-content-around   ">
                <div class="col col-md-4">

                    <p class=""> የፊሲካል ፖሊሲ እና ፐብሊክ ፋይናንስ ዘረፍ ሚኒስቴር ዴኤታ
                        ለገንዘብ ሚኒስቴር ከተሰጡት የሥራ ኃላፊነቶች መካከል አንዱ የመንግሥት ፋይናንስ አስተዳደር ነው፡፡ ዘርፉ የሀገሪቱን የፊሲካልና የታክስ ፖሊሲ በመቅረጽና
                        አፈጻጸሙን በመከታተል፣ ለልማት አስፈላጊ የሆነውን በጀት በመመደብ፣ ለፌዴራል ፈጻሚ አካላትና ለክልል የበጀት ድጋፍ ገንዘብ በማስተላለፍና ወጪን በአግባቡ
                        በማስተዳደር፣ የመሠረታዊ አገልግሎቶች በስፋት፣ በጥራትና ፍትሃዊነትን ግምት ውስጥ ባስገባ መልኩ ያስተገብራል፡፡</p>
                </div>
                <div class="col col-md-4">

                    <p class="">የመንግሥት አስፈጻሚ አካላትን ሥልጣንና ተግባር ለመወሰን በወጣው አዋጅ ቁጥር916/2008 መሰረት የገንዘብ ሚኒስቴር ከተሰጡት
                        ተግባራትና ኃላፊነቶች መካከል አንዱ የውጭ ሀብት ማሰባሰብና ማስተዳደር ነው፡፡የውጭ ሀብት ግኝትና አስተዳደርን የሚመራው የኢኮኖሚ ትብብር ዘርፍ
                        ተግባራትና ኃላፊነቶቹን ለመወጣት በሚችልበት አግባብ በሚኒስትር ደኤታ እና በስድስት ዳይሬክቶሬቶች ተደራጅቶ ሥራውን በማከናወን ላይ ይገኛል፡፡</p>
                </div>
            </div>
        </div>

    </main>
@endsection

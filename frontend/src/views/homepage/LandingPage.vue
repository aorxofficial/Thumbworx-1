<template>


	<div class="
    bg-img
    ">

		<div class="
        opacity-sec
        sec
        flex flex-col text-center p-[40px] lg:text-left">
        <br>
        <br>
            <img class="size-40 center-margin" src="https://th.bing.com/th/id/R.f60de85e220a6c066dca269bae4e4eed?rik=5V1xnEBnOuZrJg&riu=http%3a%2f%2fclipart-library.com%2fimages_k%2ftruck-silhouette-images%2ftruck-silhouette-images-24.png&ehk=XOXvl%2bhOQLME4sLz9fccgTnrTYWeaP9o7p%2fun%2bLw0nk%3d&risl=&pid=ImgRaw&r=0" alt="" srcset="">
        <br>
			<h1 class="text-5xl font-bold leading-none sm:text-6xl">
				<span class="white-txt">Thumbworx</span>
			</h1>
			<p class="mt-6 mb-8 text-lg sm:mb-12 white-txt">
				A Smart Trucking Management System
			</p>
			<div class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
        <router-link to="/loginadmin"> <a rel="noopener noreferrer"  class="px-8 py-3 text-lg font-semibold border-fmt white-txt">ADMIN</a></router-link>
		<router-link to="/login"> <a rel="noopener noreferrer"  class="px-8 py-3 text-lg font-semibold border-fmt white-txt">SUPER ADMIN</a></router-link>
			</div>
		</div>
	</div>

 
</template>

<style>

.opacity-sec{
    background-color: rgba(0, 102, 255, 0.69);
}

a:hover{
    border-style: solid ;
    border-color: rgb(0, 37, 92);
    border-width: 2px;
    color: rgb(0, 37, 92);
    background-color: rgba(255, 255, 255, 0.69);
}

.border-fmt{
    border-style: solid ;
    border-color: rgb(255, 255, 255);
    border-width: 2px;
    border-radius: 10px;
}

.white-txt{
    color: white;
}

.button-clr{
    background-color: white;
}

.sec{
    height: 100%;
    width: fit-content;
    margin-left: auto;
}

body{
    padding: 0;
}

.bg-img{
    position:fixed;
    padding:0;
    margin:0;

    top:0;
    left:0;

    width: 100%;
    height: 100%;
    background:fixed;
    background-size: cover;
    background-image: url("https://www.frost.com/wp-content/uploads/2017/07/Connected-truck-telematics.jpg");
}

</style>

<script>


</script>
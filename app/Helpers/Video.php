<?php
namespace App\Helpers;
use Carbon;
use App\Eloquent\User;
use Storage;
use Anchu\Ftp\Facades\Ftp;
const basePath = "public/video/";
class Video {
    public function formatDate($date) {
      $dateTime = Carbon\Carbon::now()->toDateTimeString();
      $time = strstr($dateTime, ' ');
      $dateTimeFormated = str_replace(['/', ' ', ':'], ['', '-', ''], $date.$time);
      return $dateTimeFormated;
    }

    public function date($date) {
      if($date == '')
         {
          $year = Carbon\Carbon::now()->year;
          $month = Carbon\Carbon::now()->month;
          $day = Carbon\Carbon::now()->day;
          $today = $day.'/'.$month.'/'.$year;
          return $today;
         }
       return $date;
    }

    public function nameVideo($dateFomated, $userId) {
      return $dateFomated. '-'. $userId;
    }

    public function saveHistory($request) {
      $user = User::findorFail($request->userId);
      $date_examination = $this->date($request->date_examination);
      $content = $request->content ? $request->content : "";
      return $history = $user->histories()->create([
        'content' => $content,
        'date_examination' => $date_examination
      ]);
    }

    public function saveMedia($history, $request) {

      if($request->video)  {
          $video = $request->video;
          $year = Carbon\Carbon::now()->year;
          $month = Carbon\Carbon::now()->month;

          $listing = FTP::connection()->getDirListing(basePath);
          foreach($listing as $folder) {
            if($folder != $year) {
              FTP::connection()->makeDir(basePath.$year.'/');
            }
          }
          $listing = FTP::connection()->getDirListing(basePath. $year . '/');
          foreach($listing as $folder) {
            if($folder != $month) {
              FTP::connection()->makeDir(basePath .$year. '/' . $month . '/');
            }
          }

          $extension = $video->getClientOriginalExtension();
          $videoName = $this->formatDate($this->date($request->date_examination));
          $videoName = $this->nameVideo($videoName, $request->userId);
          $videoNameWithExtension = $videoName . "." . $extension;
          $path = basePath . $year . '/'. $month . '/';
          if(in_array($extension, ['mpg', 'mp4', 'mov'])) {
            Storage::putFileAs(
              $path, $video, $videoNameWithExtension
            );
            if($extension == "mpg") {
                $windowspath = "D:\\xampp\\htdocs\\pk\\CL -i D:\\xampp\\htdocs\\pk\\public\\video\\$year\\$month\\$videoName.$extension -o D:\\xampp\\htdocs\\pk\\public\\video\\$year\\$month\\$videoName.mp4
                -m -E copy –audio-copy-mask ac3,dts,dtshd –audio-fallback ffac3 -e x264 -q 20 -x level=4.1:ref=4:b-adapt=2:direct=auto:me=umh:subq=8:rc-lookahead=50:psy-rd=1.0,0.15:deblock=-1,-1:vbv-bufsize=30000:vbv-maxrate=40000:slices=4";
                shell_exec($windowspath);
                shell_exec("del D:\\xampp\\htdocs\\pk\\public\\video\\$year\\$month\\$videoName.$extension");
                $extension="mp4";
            }

            $history->media()->create([
              'name' => $videoName,
              'type' => $extension,
              'path' => $path
            ]);
            return true;
          }
          return false;
        }
        return false;
    }

    public static function update($video, $media) {
      if($video) {
        $extension = $video->getClientOriginalExtension();
        if(in_array($extension, ['mp4', 'mov', 'avi', '3gp'])) {
            FTP::connection()->delete("{$media->path} . {$media->name} . '.' . {$media->type}");
            Storage::putFileAs(
              $media->path, $video, $media->name . '.' .$extension
            );
          $media->type = $extension;
          $media->save();
          return true;
        }
      return false;
    }
    return false;
   }

   public static function destroy($history) {
     $media = $history->media;
     $path = $media->path . $media->name . '.' . $media->type;
     if( $media->delete() ) {
       FTP::connection()->delete( $path );
       $history->delete();
       return true;
     }
     return false;
   }

}

 ?>

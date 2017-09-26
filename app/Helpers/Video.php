<?php
namespace App\Helpers;
use Carbon;
use App\Eloquent\User;
use Storage;
class Video {
  public function defaultDate() {
    $mytime = Carbon\Carbon::now();
    $month = $mytime->month < 10 ? "0" . $mytime->month : $mytime->month;
    $day = $mytime->day < 10 ? "0" . $mytime->day : $mytime->day;
    $date = $mytime->year . '-' . $month . '-' . $day;
    return $date;
  }
    public function formatDate($date) {
      return $dateFomated = str_replace("-","",$date);
    }

    public function date($date) {
      if($date == '')
          return $this->defaultDate();
      return $date;
    }

    public function nameVideo($dateFomated, $userId) {
      return $dateFomated. '-'. $userId;
    }

    public function saveHistory($request) {
      $user = User::findorFail($request->userId);
      $date_examination = $this->date($request->date_examination);
      $content = $request->content;
      return $history = $user->histories()->create([
        'content' => $content,
        'date_examination' => $date_examination
      ]);
    }

    public function saveMedia($history, $request) {

      if($request->hasFile('video'))  {
          $video = $request->video;
          $extension = $video->getClientOriginalExtension();
          $videoName = $this->formatDate($this->date($request->date_examination));
          $videoName = $this->nameVideo($videoName, $request->userId);
          $videoNameWithExtension = $videoName . "." . $extension;
          if(in_array($extension, ['mp4', 'mov', 'avi', '3gp'])) {
            $path = Storage::putFileAs(
              'video', $video, $videoNameWithExtension
            );
            $path = str_replace($videoNameWithExtension, "", $path);
            $history->media()->create([
              'name' => $videoName,
              'type' => $extension,
              'path' => $path
            ]);
          }
        }
    }

}

 ?>

var gulp = require('gulp')
var watch = require('gulp-watch')
var phplint = require('phplint').lint
 
gulp.task('phplint', function (cb) {
  phplint(['app/**/*.php', 'database/**/*.php'], {limit: 10}, function (err, stdout, stderr) {
    if (err) {
      cb(err)
      process.exit(1)
    }
    cb()
  })
})

 gulp.task('test', ['phplint'])
#include <jni.h>
#include <string>

extern "C" JNIEXPORT jstring JNICALL
Java_ppeteam_myapplication_MainFeature_Accueil_stringFromJNI(
        JNIEnv *env,
        jobject /* this */) {
    std::string hello = "Cookether";
    return env->NewStringUTF(hello.c_str());
}

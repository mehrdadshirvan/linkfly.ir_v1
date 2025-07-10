import {FormEventHandler, useState} from 'react';
import {Head, Link, useForm} from "@inertiajs/react";
import LoadingSpinner from "@/Components/LoadingSpinner";
import InputError from "@/Components/InputError";
import axios from "axios";
import {FaRegCopy} from "react-icons/fa";
import CopyToClipboard from "@/Utils/CopyToClipboard";

export default function Welcome({csrf_token}:any) {
    const [input, setInput] = useState('');
    const [error, setError] = useState([]);
    const [shortUrl,setShortUrl] = useState('');
    const [qrCode,setQrCode] = useState('');

    const {data, setData, post, processing, errors, reset} = useForm({
        url: '',
        "_token": csrf_token,
        "_method": "POST",
    });


    const submit = async () => {
        let response:any = await fetch('/generate-link',{
            method:"post",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": csrf_token
            },
            body: JSON.stringify(data),
        });
        let dataRes:any = await response.json();
        if(dataRes?.errors){
            setError(dataRes?.errors.url);
        }else{
            setError([]);
        }
        setShortUrl(dataRes?.short_url);
        setQrCode(dataRes?.qr_codes?.simple);

    }

    return (
        <>
            <Head title={'کوتاه کننده لینک'}/>
            <div className="min-h-screen flex items-center justify-center bg-[url(/assets/images/bg2.jpg)] bg-center bg-cover font-sans" dir="rtl">
                <div className="bg-white/90 backdrop-blur-sm  border border-gray-200 rounded-2xl py-6 px-8 w-full max-w-md flex flex-col items-center">
                    <Link href={'/'}>
                        <img src="/assets/images/linkfly-logo-1x1-64.png" alt="link fly logo - short link with Qrcode"/>
                    </Link>
                    <h1 className="text-3xl font-extrabold text-first mb-2 tracking-tight w-full text-center">LinkFly</h1>
                    <h2 className="text-gray-800 mb-1 text-center w-full">
                       کوتاه کننده لینک <b>رایگان</b>
                    </h2>
                    <h2 className="text-gray-800 mb-8 text-center w-full">
                      Qrcode <b>رایگان</b> بدون تاریخ انقضا
                    </h2>
                    <div className="mb-3 w-full ">
                        <input
                            type="url"
                            placeholder="لینک خود را وارد کنید..."
                            className="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 text-base mb-0 transition text-left placeholder:text-center bg-gray-50"
                            value={data?.url}
                            onChange={(e: any) => setData('url', e.target.value)}
                            dir="rtl"
                        />
                       <div className="flex justify-center">
                           {
                               error && error.map((ii) => <span className="text-center text-red-500 my-1">{ii}</span>)
                           }
                       </div>
                    </div>
                    <button
                        className="w-full py-2 rounded-lg bg-blue-600 text-white font-bold text-base hover:bg-blue-700 transition mb-6 text-center flex gap-2 justify-center disabled:bg-blue-300"
                        disabled={processing}
                        onClick={submit}
                    >
                        کوتاه کن!
                        {processing && <LoadingSpinner/>}
                    </button>
                    <div className={`w-full flex flex-col items-center gap-3 mt-2 ${shortUrl || qrCode ? ' ' : 'hidden'}`} >
                        <span className="text-gray-700 font-semibold w-full text-center">لینک کوتاه شما:</span>
                        <div className="bg-gray-50 rounded px-3 py-2 text-blue-600 font-mono text-left break-all select-all cursor-pointer w-full border border-gray-200" dir="ltr">
                            <div className="flex justify-between items-center">
                                <a href={shortUrl} target="_blank">{shortUrl}</a>
                                <button onClick={(e:any)=> shortUrl ? CopyToClipboard(shortUrl) : null} className="text-gray-500 hover:text-blue-600"><FaRegCopy /></button>
                            </div>
                        </div>
                        <span className="text-gray-700 font-semibold mt-2 w-full text-center mb-0">QR Code:</span>
                        <p className="text-gray-700 text-xs font-semibold mt-0 w-full text-center">
                            برای دانلود روی عکس کلیک کنید.
                        </p>
                        <div className="p-2 rounded flex items-center justify-center">
                            <div className="w-full md:w-2/3 p-2 bg-white flex items-center justify-center text-gray-400 text-xs border border-gray-200">
                                <a download="short_link.svg" href={qrCode} target="_blank">
                                    <img src={qrCode} className="w-full" alt=""/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer className="w-full text-center py-4 bg-white/40 backdrop-blur-sm text-gray-600 text-sm fixed bottom-0 left-0 z-10 shadow-inner">
                © {new Date().getFullYear()} LinkFly. همه حقوق محفوظ است.
            </footer>
        </>
    );
}
